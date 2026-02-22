if (!window.Joomla) {
  throw new Error('Joomla API was not properly initialised');
}

const { suffix } = Joomla.getOptions('mod_event_carousel.vars');
document.querySelectorAll('.mod_event_carousel').forEach(element => {
  element.innerText += suffix;
});