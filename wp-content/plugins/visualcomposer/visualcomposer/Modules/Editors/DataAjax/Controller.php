<?php

namespace VisualComposer\Modules\Editors\DataAjax;

if (!defined('ABSPATH')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit;
}

use VisualComposer\Helpers\Access\CurrentUser;
use VisualComposer\Helpers\Access\UserCapabilities;
use VisualComposer\Helpers\Filters;
use VisualComposer\Framework\Illuminate\Support\Module;
use VisualComposer\Helpers\PostType;
use VisualComposer\Helpers\Request;
use VisualComposer\Helpers\Options;
use VisualComposer\Framework\Container;
use VisualComposer\Helpers\Traits\EventsFilters;
use VisualComposer\Helpers\Traits\WpFiltersActions;

/**
 * Class Controller.
 */
class Controller extends Container implements Module
{
    use EventsFilters;
    use WpFiltersActions;

    /**
     * @var \VisualComposer\Helpers\Options
     */
    protected $options;

    public function __construct(Options $optionsHelper)
    {
        $this->options = $optionsHelper;
        /** @see \VisualComposer\Modules\Editors\DataAjax\Controller::getData */
        $this->addFilter(
            'vcv:ajax:getData:adminNonce',
            'getData'
        );

        /** @see \VisualComposer\Modules\Editors\DataAjax\Controller::setData */
        $this->addFilter(
            'vcv:ajax:setData:adminNonce',
            'setData'
        );
    }

    /**
     * Get post content.
     *
     * @param $response
     * @param \VisualComposer\Helpers\Request $requestHelper
     * @param \VisualComposer\Helpers\Filters $filterHelper
     * @param \VisualComposer\Helpers\Access\CurrentUser $currentUserAccessHelper
     *
     * @return mixed|string
     */
    private function getData(
        $response,
        Request $requestHelper,
        Filters $filterHelper,
        CurrentUser $currentUserAccessHelper
    ) {
        // @codingStandardsIgnoreLine
        global $post_type_object;
        $data = '';
        $sourceId = $requestHelper->input('vcv-source-id');
        if (!is_array($response)) {
            $response = [];
        }
        // @codingStandardsIgnoreLine
        if (is_numeric($sourceId) && $currentUserAccessHelper->wpAll([ $post_type_object->cap->read, $sourceId])->get()) {
            $postMeta = get_post_meta($sourceId, VCV_PREFIX . 'pageContent', true);
            if (!empty($postMeta)) {
                $data = $postMeta;
                /* !empty($postMeta) ? $postMeta : get_post($sourceId)->post_content; */
            }
            $response['post_content'] = get_post($sourceId)->post_content;
            $responseExtra = $filterHelper->fire(
                'vcv:dataAjax:getData',
                [
                    'status' => true,
                ],
                [
                    'sourceId' => $sourceId,
                ]
            );
            $response = array_merge($response, $responseExtra);
        }
        $response['data'] = $data;

        return $response;
    }

    /**
     * Save post content and used assets.
     *
     * @param $response
     * @param \VisualComposer\Helpers\Request $requestHelper
     * @param \VisualComposer\Helpers\Access\UserCapabilities $userCapabilitiesHelper
     *
     * @return array|null
     */
    private function setData(
        $response,
        Request $requestHelper,
        UserCapabilities $userCapabilitiesHelper
    ) {
        if ($requestHelper->input('vcv-ready') !== '1') {
            return $response;
        }
        $sourceId = $requestHelper->input('vcv-source-id');

        if (!is_array($response)) {
            $response = [];
        }

        if (is_numeric($sourceId) && $userCapabilitiesHelper->canEdit($sourceId)) {
            $sourceId = (int)$sourceId;
            $post = get_post($sourceId);
            if ($post) {
                return $this->updatePostData($post, $sourceId, $response);
            }
        }
        if (!is_array($response)) {
            $response = [];
        }
        $response['status'] = false;

        return $response;
    }

    protected function createPreviewPost($post, $sourceId)
    {
        $previewPosts = get_posts(
            [
                'post_parent' => $sourceId,
                'author' => $post->author,
                'post_status' => 'inherit',
                'post_type' => 'revision',
                'orderby' => 'ID',
                'order' => 'DESC',
            ]
        );
        $previewPost = [];
        // @codingStandardsIgnoreLine
        if ('publish' === $post->post_status) {
            $previewPost[0]['post_name'] = $post->ID . '-autosave-v1';
        } else {
            $previewPost[0]['post_name'] = $post->ID . '-revision-v1';
        }
        // @codingStandardsIgnoreLine
        $previewPost[0]['post_content'] = $post->post_content;
        $previewPost[0]['post_status'] = 'inherit';
        $previewPost[0]['post_type'] = 'revision';
        $previewPost[0]['comment_status'] = 'closed';
        $previewPost[0]['ping_status'] = 'closed';
        $previewPost[0]['author'] = $post->author;
        $previewPost[0]['post_parent'] = $post->ID;

        if ($previewPosts) {
            $previewPost[0]['ID'] = $previewPosts[0]->ID;
        } else {
            $previewPost[0]['ID'] = null;
        }

        return $previewPost;
    }

    protected function updatePostData($post, $sourceId, $response)
    {
        $filterHelper = vchelper('Filters');
        $postTypeHelper = vchelper('PostType');
        $currentUserAccessHelper = vchelper('AccessCurrentUser');
        $requestHelper = vchelper('Request');

        $data = $requestHelper->input('vcv-data');
        $dataDecoded = $requestHelper->inputJson('vcv-data');
        $content = $requestHelper->input('vcv-content');

        // @codingStandardsIgnoreStart
        $post->post_content = $content;
        if (isset($dataDecoded['draft']) && $post->post_status !== 'publish') {
            $post->post_status = 'draft';
        } else if (isset($dataDecoded['inherit'])) {
            $previewPost = $this->createPreviewPost($post,$sourceId);
        } else {
            if ($currentUserAccessHelper->wpAll(
                [get_post_type_object($post->post_type)->cap->publish_posts, $sourceId]
            )->get()) {
                $post->post_status = 'publish';
            } else {
                $post->post_status = 'pending';
            }
        }
        // @codingStandardsIgnoreEnd
        //temporarily disable
        remove_filter('content_save_pre', 'wp_filter_post_kses');
        remove_filter('content_filtered_save_pre', 'wp_filter_post_kses');

        if (isset($dataDecoded['inherit'])) {
            // @codingStandardsIgnoreLine
            if ('draft' === $post->post_status || 'auto-draft' === $post->post_status) {
                // @codingStandardsIgnoreLine
                $post->post_status = 'draft';
                wp_update_post($post);
                update_metadata('post', $sourceId, VCV_PREFIX . 'pageContent', $data);

                $previewSourceId = wp_update_post($previewPost[0]);
                update_metadata('post', $previewSourceId, VCV_PREFIX . 'pageContent', $data);
            } else {
                $previewSourceId = wp_update_post($previewPost[0]);
                update_metadata('post', $previewSourceId, VCV_PREFIX . 'pageContent', $data);
            }
        } else {
            wp_update_post($post);
            update_post_meta($sourceId, VCV_PREFIX . 'pageContent', $data);
        }

        //bring it back once you're done posting
        add_filter('content_save_pre', 'wp_filter_post_kses');
        add_filter('content_filtered_save_pre', 'wp_filter_post_kses');
        $postTypeHelper->setupPost($sourceId);
        $responseExtra = $filterHelper->fire(
            'vcv:dataAjax:setData',
            [
                'status' => true,
                'postData' => $postTypeHelper->getPostData(),
            ],
            [
                'sourceId' => $sourceId,
                'post' => $post,
                'data' => $data,
            ]
        );

        return array_merge($response, $responseExtra);
    }
}
