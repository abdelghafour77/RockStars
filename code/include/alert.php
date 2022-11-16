<script>
      <?php if (isset($_SESSION['message'])) { ?>
            const Toast = Swal.mixin({
                  width: '25em',
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 4000,
                  timerProgressBar: false,
                  didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
            })

            Toast.fire({
                  icon: '<?= $_SESSION['type_message'] ?>',
                  title: '<?= $_SESSION['message'] ?>'
            })
      <?php
            unset($_SESSION['type_message']);
            unset($_SESSION['message']);
      } ?>
</script>