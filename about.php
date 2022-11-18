<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>

<div class="content-wrapper">
<div class="container">

<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-sm-9">
<div class="box box-solid">
<div class="box-body">
<h2 class="page-header">
Dear Readers,
</h2>
<p>
We offer a tremendous gathering of books in the various genre classifications of Fantasy, Action,
Thriller, Romance and Mystery. Other than this, we likewise offer an expansive gathering of E-Books at reasonable valuing.
<br/><br/>
We endeavour to broaden consumer loyalty by providing simple ease of using web indexes, 
brisk and easy-to-understand instalment alternatives, and snappier conveyance frameworks. Upside to the majority of 
this, we are arranged to give energising offers and charming limits on our books.
<br/><br/>
Too, we modestly welcome every one of the merchants around the nation to band together with us. We 
will without a doubt give you the stage to many shimmering areas and develop the “Readers Delight” 
family. We might want to thank you for shopping with us.
</p>
<br/>
<h3 class="page-header">Our Location and Operating Hours</h3>
<div class="box-body">
<table style="width='100%'; border=0; margin:auto;">
<tr>
<td width="50%"><div><i class="fas fa-map-marker-alt"></i>&nbsp Bukit Jambul, Penang, Malaysia</div></td>
<td width="50%"><div style="float:right"><i class="fas fa-clock"></i>&nbsp Mon - Fri 8:00 AM to 5:00 PM</div></td>
</tr>
</table>
<br/>
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15889.967954798654!2d100.2818707!3d5.3416038
    !3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x881c46d428b3162c!2sINTI%20International
    %20College%20Penang!5e0!3m2!1sen!2smy!4v1664863231556!5m2!1sen!2smy"
width=100% height="600" style="border:0;" allowfullscreen=""
loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<?php
if(isset($_SESSION['error'])){
echo "
<div class='alert alert-danger'>
".$_SESSION['error']."
</div>
";
unset($_SESSION['error']);
}
?>
</div>
</div>

</div>
<div class="col-sm-3">
<?php include 'includes/sidebar.php'; ?>
</div>
</div>
</section>

</div>
</div>

<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>
