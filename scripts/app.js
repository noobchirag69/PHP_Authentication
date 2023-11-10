// Toggle between hiding and showing the dropdown content
const dropbtn = document.querySelector(".dropBtn");
dropbtn.addEventListener("click", () => {
  document.querySelector("#myDropdown").classList.toggle("show");
});

// Close the dropdown if the user clicks outside of it
window.onclick = (event) => {
  if (!event.target.matches(".dropBtn")) {
    let dropdowns = document.getElementsByClassName("dropdown-content");
    let i;
    for (i = 0; i < dropdowns.length; i++) {
      let openDropdown = dropdowns[i];
      if (openDropdown.classList.contains("show")) {
        openDropdown.classList.remove("show");
      }
    }
  }
};

// Confirm Deletion
function confirmDelete() {
  let result = confirm(
    "Account once deleted can't be recovered. Want to proceed?"
  );
  return result;
}
