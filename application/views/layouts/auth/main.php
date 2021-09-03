<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <?php include('topcss.php');?>
</head>
<body class="hold-transition login-page">
    <!-- Main content -->
    <?php
    $this->load->view($page_type.'/'.$page_name);
    ?>
    <?php include('scripts.php');?>
</body>
</html>
