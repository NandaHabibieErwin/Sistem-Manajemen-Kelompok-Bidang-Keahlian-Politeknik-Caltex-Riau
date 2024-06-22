var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block";
};

span.onclick = function() {
  modal.style.display = "none";
};

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

var modals = document.getElementById("myModals");
var btn1 = document.getElementById("myBtn1");
var spans = document.getElementsByClassName("close")[1]; // Use index 1 for the second close button

btn1.onclick = function() {
  modals.style.display = "block";
};

spans.onclick = function() { // Use the spans variable for the second modal
  modals.style.display = "none";
};

window.onclick = function(event) {
  if (event.target == modals) { // Check against modals instead of modal
    modals.style.display = "none";
  }
};

// Get the select element
var select = document.getElementById("mySelect");

// Get the select options container
var selectOptions = select.nextElementSibling;

// Toggle the display of select options
select.addEventListener("click", function() {
  selectOptions.style.display = selectOptions.style.display === "block" ? "none" : "block";
});

// Close select options when clicking outside
window.addEventListener("click", function(event) {
  if (!select.contains(event.target)) {
    selectOptions.style.display = "none";
  }
});

$(document).ready(function () {
  $('#example').DataTable();
});
