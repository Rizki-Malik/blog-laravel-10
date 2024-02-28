setTimeout(() => {
  const successAlert = document.getElementById('success-alert');

  if (successAlert) {
      successAlert.classList.add('transition-opacity', 'ease-in-out', 'duration-300', 'opacity-0');

      setTimeout(() => successAlert.remove(), 300);
  }
}, 3000);


document.addEventListener('DOMContentLoaded', function () {
  const menuButton = document.getElementById('menu-button');
  const dropdownMenu = document.getElementById('dropdown-menu');

  if (menuButton && dropdownMenu) {
      menuButton.addEventListener('click', function () {
          const isExpanded = menuButton.getAttribute('aria-expanded') === 'true';
          menuButton.setAttribute('aria-expanded', String(!isExpanded));
          dropdownMenu.classList.toggle('hidden');
      });

      document.addEventListener('click', function (event) {
          if (!dropdownMenu.contains(event.target) && !menuButton.contains(event.target)) {
              menuButton.setAttribute('aria-expanded', 'false');
              dropdownMenu.classList.add('hidden');
          }
      });
  }
});

function confirmDelete() {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "bg-green-500 p-2 mx-2 text-white rounded-lg",
            cancelButton: "bg-red-500 p-2 mx-2 text-white rounded-lg"
        },
        buttonsStyling: false
    });

    swalWithBootstrapButtons.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("deleteForm").submit();
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire({
                title: "Cancelled",
                text: "Your data is safe :)",
                icon: "error"
            });
        }
    });
}