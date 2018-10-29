document.addEventListener(
  'DOMContentLoaded',
  () => {
    setTimeout(() => {
      if ('ga' in window) {
        tracker = ga.getAll()[0]
        if (tracker) {
          addEvent(document.querySelector('.pum-close'), 'click', function() {
            tracker.send('event', 'Newsletter', 'Popup', 'Close')
          })
        }
      }
    }, 100)
  },
  false
)

function addEvent(element, evnt, funct) {
  if (element.attachEvent) return element.attachEvent('on' + evnt, funct)
  else return element.addEventListener(evnt, funct, false)
}
