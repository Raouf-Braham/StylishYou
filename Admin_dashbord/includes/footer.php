<footer class="footer pt-5">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              © <script>
                document.write(new Date().getFullYear())
              </script>,
              made with <i class="fa fa-heart"></i> by
              <a href="https://www.linkedin.com/in/raouf-braham-67b365251" class="font-weight-bold" target="_blank">Raouf Braham</a>
              for a better web.
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
            <li class="nav-item">
                <a href="#" class="nav-link pe-0 text-muted" target="_blank">About Us</a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link pe-0 text-muted" target="_blank">Services</a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link pe-0 text-muted" target="_blank">Contact</a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link pe-0 text-muted" target="_blank">About</a>
              </li>
            </ul>
          </div>
        </div>
    </div>
    </footer>
</main>

<script src="assets/js/jquery-3.7.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/perfect-scrollbar.min.js"></script>
<script src="assets/js/smooth-scrollbar.min.js"></script>

<!-- SweetAlert JS script -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="assets/js/custom.js"></script>

<!-- Alertify JS script -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>


<script>

  <?php 
    if(isset($_SESSION['message'])) { ?>
      alertify.set('notifier','position', 'top-right');
      alertify.success('<?= $_SESSION['message']; ?>');
    <?php 
      unset($_SESSION['message']);
    } 
  ?>
</script>

</body> 
</html>