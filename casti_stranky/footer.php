<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="inner-content">
          <p>
            &copy; 2020 Sixteen Clothing Co., Ltd. - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a>
          </p>
          <?php
          if (isset($_SESSION['valid']) && $_SESSION['valid']) {
              echo '<div class="logout-button"><a href="functions/logout.php">Logout</a></div>';
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</footer>
</body>
</html>
