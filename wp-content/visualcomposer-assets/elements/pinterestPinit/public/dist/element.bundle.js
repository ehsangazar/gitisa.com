webpackJsonp([0],{

/***/ 0:
/***/ function(module, exports, __webpack_require__) {

	eval("'use strict';\n\nvar _vcCake = __webpack_require__(\"./node_modules/vc-cake/index.js\");\n\nvar _vcCake2 = _interopRequireDefault(_vcCake);\n\nvar _component = __webpack_require__(\"./pinterestPinit/component.js\");\n\nvar _component2 = _interopRequireDefault(_component);\n\nfunction _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }\n\nvar vcvAddElement = _vcCake2.default.getService('cook').add;\n\nvcvAddElement(__webpack_require__(\"./pinterestPinit/settings.json\"),\n// Component callback\nfunction (component) {\n  component.add(_component2.default);\n},\n// css settings // css for element\n{ \"css\": __webpack_require__(\"./node_modules/raw-loader/index.js!./pinterestPinit/styles.css\"), \"editorCss\": __webpack_require__(\"./node_modules/raw-loader/index.js!./pinterestPinit/editor.css\") }, '');\n\n/*****************\n ** WEBPACK FOOTER\n ** ./pinterestPinit/index.js\n ** module id = 0\n ** module chunks = 0\n **/\n//# sourceURL=webpack:///./pinterestPinit/index.js?");

/***/ },

/***/ "./pinterestPinit/component.js":
/***/ function(module, exports, __webpack_require__) {

	eval("'use strict';\n\nObject.defineProperty(exports, \"__esModule\", {\n  value: true\n});\n\nvar _extends2 = __webpack_require__(\"./node_modules/babel-runtime/helpers/extends.js\");\n\nvar _extends3 = _interopRequireDefault(_extends2);\n\nvar _getPrototypeOf = __webpack_require__(\"./node_modules/babel-runtime/core-js/object/get-prototype-of.js\");\n\nvar _getPrototypeOf2 = _interopRequireDefault(_getPrototypeOf);\n\nvar _classCallCheck2 = __webpack_require__(\"./node_modules/babel-runtime/helpers/classCallCheck.js\");\n\nvar _classCallCheck3 = _interopRequireDefault(_classCallCheck2);\n\nvar _createClass2 = __webpack_require__(\"./node_modules/babel-runtime/helpers/createClass.js\");\n\nvar _createClass3 = _interopRequireDefault(_createClass2);\n\nvar _possibleConstructorReturn2 = __webpack_require__(\"./node_modules/babel-runtime/helpers/possibleConstructorReturn.js\");\n\nvar _possibleConstructorReturn3 = _interopRequireDefault(_possibleConstructorReturn2);\n\nvar _inherits2 = __webpack_require__(\"./node_modules/babel-runtime/helpers/inherits.js\");\n\nvar _inherits3 = _interopRequireDefault(_inherits2);\n\nvar _react = __webpack_require__(\"./node_modules/react/react.js\");\n\nvar _react2 = _interopRequireDefault(_react);\n\nvar _vcCake = __webpack_require__(\"./node_modules/vc-cake/index.js\");\n\nvar _vcCake2 = _interopRequireDefault(_vcCake);\n\nfunction _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }\n\nvar vcvAPI = _vcCake2.default.getService('api');\nvar cook = _vcCake2.default.getService(\"cook\");\n\nvar PinterestPinit = function (_vcvAPI$elementCompon) {\n  (0, _inherits3.default)(PinterestPinit, _vcvAPI$elementCompon);\n\n  function PinterestPinit() {\n    (0, _classCallCheck3.default)(this, PinterestPinit);\n    return (0, _possibleConstructorReturn3.default)(this, (PinterestPinit.__proto__ || (0, _getPrototypeOf2.default)(PinterestPinit)).apply(this, arguments));\n  }\n\n  (0, _createClass3.default)(PinterestPinit, [{\n    key: 'componentDidMount',\n    value: function componentDidMount() {\n      this.insertHtml(this.props.atts);\n    }\n  }, {\n    key: 'componentWillReceiveProps',\n    value: function componentWillReceiveProps(nextProps) {\n      if (this.props.atts.type !== nextProps.atts.type) {\n        this.insertHtml(nextProps.atts);\n      }\n    }\n  }, {\n    key: 'insertHtml',\n    value: function insertHtml(props) {\n      var button = this.createHtml(props);\n      var script = '<script type=\"text/javascript\" async defer src=\"https://assets.pinterest.com/js/pinit.js\"></script>';\n      var html = button + script;\n      var wrapper = this.refs.pinterestInner;\n      this.updateInlineHtml(wrapper, html);\n\n      var iframe = document.querySelector('#vcv-editor-iframe').contentWindow;\n      if (iframe.PinUtils) {\n        iframe.PinUtils.build(this.getDomNode());\n      }\n    }\n  }, {\n    key: 'createHtml',\n    value: function createHtml(props) {\n      var element = document.createElement('a');\n      element.href = 'https://www.pinterest.com/pin/create/button/';\n\n      if (props.type === 'default') {\n        element.setAttribute('data-pin-do', 'buttonBookmark');\n      } else {\n        element.setAttribute('data-pin-do', 'buttonPin');\n      }\n\n      if (props.type === 'round') {\n        element.setAttribute('data-pin-shape', 'round');\n      } else if (props.type === 'large') {\n        element.setAttribute('data-pin-height', '28');\n      } else if (props.type === 'tallBubble') {\n        element.setAttribute('data-pin-config', 'above');\n      } else if (props.type === 'tallCounter') {\n        element.setAttribute('data-pin-config', 'beside');\n      }\n\n      var elementWrapper = document.createElement('div');\n      elementWrapper.appendChild(element);\n      return elementWrapper.innerHTML;\n    }\n  }, {\n    key: 'render',\n    value: function render() {\n      var _props = this.props,\n          id = _props.id,\n          atts = _props.atts,\n          editor = _props.editor;\n      var customClass = atts.customClass,\n          alignment = atts.alignment,\n          metaCustomId = atts.metaCustomId;\n\n      var classes = 'vce-pinterest-pinit';\n      var innerClasses = 'vce-pinterest-pinit-inner vce';\n      var customProps = {};\n\n      if (customClass) {\n        classes += ' ' + customClass;\n      }\n\n      if (alignment) {\n        classes += ' vce-pinterest-pinit--align-' + alignment;\n      }\n\n      if (metaCustomId) {\n        customProps.id = metaCustomId;\n      }\n\n      var doAll = this.applyDO('all');\n\n      return _react2.default.createElement(\n        'div',\n        (0, _extends3.default)({}, customProps, { className: classes }, editor),\n        _react2.default.createElement(\n          'div',\n          (0, _extends3.default)({ className: innerClasses, ref: 'pinterestInner', id: 'el-' + id }, doAll),\n          'Google Plus Button'\n        )\n      );\n    }\n  }]);\n  return PinterestPinit;\n}(vcvAPI.elementComponent);\n\nexports.default = PinterestPinit;\n\n/*****************\n ** WEBPACK FOOTER\n ** ./pinterestPinit/component.js\n ** module id = ./pinterestPinit/component.js\n ** module chunks = 0\n **/\n//# sourceURL=webpack:///./pinterestPinit/component.js?");

/***/ },

/***/ "./pinterestPinit/settings.json":
/***/ function(module, exports) {

	eval("module.exports = {\"designOptions\":{\"type\":\"designOptions\",\"access\":\"public\",\"value\":{},\"options\":{\"label\":\"Design Options\"}},\"editFormTab1\":{\"type\":\"group\",\"access\":\"protected\",\"value\":[\"type\",\"alignment\",\"metaCustomId\",\"customClass\"],\"options\":{\"label\":\"General\"}},\"metaEditFormTabs\":{\"type\":\"group\",\"access\":\"protected\",\"value\":[\"editFormTab1\",\"designOptions\"]},\"relatedTo\":{\"type\":\"group\",\"access\":\"protected\",\"value\":[\"General\"]},\"customClass\":{\"type\":\"string\",\"access\":\"public\",\"value\":\"\",\"options\":{\"label\":\"Extra class name\",\"description\":\"Add an extra class name to the element and refer to it from Custom CSS option.\"}},\"type\":{\"type\":\"dropdown\",\"access\":\"public\",\"value\":\"default\",\"options\":{\"label\":\"Type\",\"values\":[{\"label\":\"Default\",\"value\":\"default\"},{\"label\":\"Round\",\"value\":\"round\"},{\"label\":\"Large\",\"value\":\"large\"},{\"label\":\"Tall Bubble\",\"value\":\"tallBubble\"},{\"label\":\"Tall Counter\",\"value\":\"tallCounter\"}]}},\"assetsLibrary\":{\"access\":\"public\",\"type\":\"string\",\"value\":[\"animate\"]},\"alignment\":{\"type\":\"buttonGroup\",\"access\":\"public\",\"value\":\"left\",\"options\":{\"label\":\"Alignment\",\"values\":[{\"label\":\"Left\",\"value\":\"left\",\"icon\":\"vcv-ui-icon-attribute-alignment-left\"},{\"label\":\"Center\",\"value\":\"center\",\"icon\":\"vcv-ui-icon-attribute-alignment-center\"},{\"label\":\"Right\",\"value\":\"right\",\"icon\":\"vcv-ui-icon-attribute-alignment-right\"}]}},\"metaDisableInteractionInEditor\":{\"type\":\"toggle\",\"access\":\"protected\",\"value\":true},\"metaCustomId\":{\"type\":\"customId\",\"access\":\"public\",\"value\":\"\",\"options\":{\"label\":\"Element ID\",\"description\":\"Apply unique Id to element to link directly to it by using #your_id (for element id use lowercase input only).\"}},\"tag\":{\"access\":\"protected\",\"type\":\"string\",\"value\":\"pinterestPinit\"}}\n\n/*****************\n ** WEBPACK FOOTER\n ** ./pinterestPinit/settings.json\n ** module id = ./pinterestPinit/settings.json\n ** module chunks = 0\n **/\n//# sourceURL=webpack:///./pinterestPinit/settings.json?");

/***/ },

/***/ "./node_modules/raw-loader/index.js!./pinterestPinit/styles.css":
/***/ function(module, exports) {

	eval("module.exports = \".vce-pinterest-pinit {\\n  line-height: 1;\\n}\\n\\n.vce-pinterest-pinit--align-center {\\n  text-align: center;\\n}\\n\\n.vce-pinterest-pinit--align-right {\\n  text-align: right;\\n}\\n\\n.vce-pinterest-pinit--align-left {\\n  text-align: left;\\n}\\n\\n.vce-pinterest-pinit-inner {\\n  vertical-align: top;\\n  display: inline-block;\\n}\\n\"\n\n/*****************\n ** WEBPACK FOOTER\n ** ./~/raw-loader!./pinterestPinit/styles.css\n ** module id = ./node_modules/raw-loader/index.js!./pinterestPinit/styles.css\n ** module chunks = 0\n **/\n//# sourceURL=webpack:///./pinterestPinit/styles.css?./~/raw-loader");

/***/ },

/***/ "./node_modules/raw-loader/index.js!./pinterestPinit/editor.css":
/***/ function(module, exports) {

	eval("module.exports = \"[data-vcv-element-disable-interaction=\\\"true\\\"] .vce-pinterest-pinit-inner {\\n  position: relative;\\n}\\n\\n[data-vcv-element-disable-interaction=\\\"true\\\"] .vce-pinterest-pinit-inner::after {\\n  content: \\\"\\\";\\n  position: absolute;\\n  top: 0;\\n  right: 0;\\n  bottom: 0;\\n  left: 0;\\n  z-index: 999;\\n}\\n\\n.vce-pinterest-pinit {\\n  min-height: 1em;\\n}\\n\"\n\n/*****************\n ** WEBPACK FOOTER\n ** ./~/raw-loader!./pinterestPinit/editor.css\n ** module id = ./node_modules/raw-loader/index.js!./pinterestPinit/editor.css\n ** module chunks = 0\n **/\n//# sourceURL=webpack:///./pinterestPinit/editor.css?./~/raw-loader");

/***/ }

});