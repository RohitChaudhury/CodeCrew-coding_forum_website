<footer class="py-4 bg-light mt-4">
  <div class="container-fluid px-4">
    <div class="d-flex align-items-center justify-content-center small">
      <div class="text-muted">Copyright &copy; 2023 Rohit Chaudhury</div>
    </div>
</footer>
</div>
</body>

<!-- Javascript for the Modal of BS -->
<script>
  $('#myModal').on('shown.bs.modal', function() {
    $('#myInput').trigger('focus')
  })
</script>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- script function for tooltip -->
<script>
  $(function() {
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>

</html>