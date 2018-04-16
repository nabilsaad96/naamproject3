function init() {
  // set event handlers on body load
  document.getElementById('addEventButton').onclick = showForm;
  document.getElementById('submitEventButton').onclick = createNewEvent;\
}

function showForm() {
  // first, clear/reset the fields
  document.getElementById('eventYear').value = '';
  document.getElementById('eventTitle').value = '';
  document.getElementById('eventDescription').value = '';

  // show the form
  document.getElementById('addEventForm').style.display = 'block';
}

function createNewEvent() {
  // create event heading
  var h4 = document.createElement('H4');
  var title = document.createTextNode(document.getElementById('eventYear').value + ' - ' + document.getElementById('eventTitle').value);
  h4.appendChild(title);

  // create event details
  var p = document.createElement('P');
  var description = document.createTextNode(document.getElementById('eventDescription').value);
  p.appendChild(description);

  var events = document.getElementById('events');
  // append event data to events <div>
  events.appendChild(h4);
  events.appendChild(p);

  // hide the form
  document.getElementById('addEventForm').style.display = 'none';
}
