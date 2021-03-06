<?php 
session_start();
if($_SESSION['username_training']=="") {
header('location:http://www.psit.in');
}
 
require_once('conn.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Exam</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<script src="ckeditor/_samples/sample.js" type="text/javascript"></script>
	<link href="ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		<!-- Logo + Top Nav -->
		<div id="top">
			<h1><a href="#">PSIT Online Test</a></h1>
			<div id="top-navigation">
			Welcome <a href="#"><strong><?php echo $_SESSION['username']?></strong></a>
				<span>|</span>
				<a href="logout.php">Log out</a>
			</div>
		</div>
		<!-- End Logo + Top Nav -->
		
		<!-- Main Nav -->
		<div id="navigation">
			<ul>
			    <li><a href="index.php"><span>Home</span></a></li>
			    <li><a href="Question_Bank.php" class="active"><span>Question Bank</span></a></li>
			    <li><a href="Create_Test.php"><span>Create Test</span></a></li>
			    <li><a href="All_Test.php"><span>All Test</span></a></li>
			    <li><a href="Assign_Test.php"><span>Assign Test</span></a></li>
			    <li><a href="Result.php"><span>Results</span></a></li>
			</ul>
		</div>
		<!-- End Main Nav -->
	</div>
</div>
<!-- End Header -->

<!-- Container -->
<div id="container">
	<div class="shell">
		
		<!-- Small Nav -->
		<div class="small-nav"></div>
		<!-- End Small Nav -->
		
		<!-- Message OK -->		
		<?php if($_GET['msg']!=''){?>
		
		<div class="msg msg-ok">
			<p><strong><?php echo $_GET['msg']?></strong></p>
			<a href="#" class="close">close</a>
		</div>
		
		<?php }?>
		<!-- End Message OK -->		
		
		<!-- Message Error -->
		<!-- End Message Error -->
        <br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				
				<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">View Question Bank</h2>
					    <div class="right"></div>
					</div>
					<!-- End Box Head -->	

					<!-- Table -->
					<div class="table">
						<table width="99%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th width="11%">Question No </th>
								<th width="25%">Question</th>
								<th width="20%">Correct Answer</th>
								<th width="17%">Added By </th>
								<th width="18%">Date</th>
								<th width="9%">&nbsp;&nbsp;&nbsp;&nbsp;Edit</th>
							</tr>
							
							<?php 
	 $str = "SELECT  * FROM  V_Question_Answer where Subject_Id=".$_GET['s_id']."and IsCorrect='1'" ;
 		$rs= $conn->execute($str);
		while (!$rs->EOF)  
		{
							?><input type="hidden" name="subject_id" value="<?php echo $_GET['id']?>"  />
							<tr>
								<td><h3><?php echo $rs->fields('Question_Id')?></h3></td>
								<td><?php echo $rs->fields('Question')?></td>
								<td><?php echo $rs->fields('Answer_Text')?></td>
								<td><?php echo $rs->fields('AddedBy')?></td>
								<td><?php echo $rs->fields('Date')?></td>
								<td align="left" valign="middle"><a href="Question_Bank_Edit.php?s_id=<?php echo $rs->fields('Subject_Id')?>&q_id=<?php echo $rs->fields('Question_Id')?>" class="ico edit">Edit</a></td>
							</tr>
							
							
						<?php 
						
						$rs->MoveNext();
						}?>
					  </table>
						
						
						<!-- Pagging -->
						<div class="pagging"></div>
						<!-- End Pagging -->
						
					</div>
					<!-- Table -->
					
				</div>
				<!-- End Box -->
				
				<!-- Box -->
				<!-- End Box -->
            </div>
			<!-- End Content -->
			
			<!-- Sidebar -->
			<!-- End Sidebar -->
<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
</div><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<!-- End Container -->

<!-- Footer -->
<?php include("footer.php"); ?>
<!-- End Footer -->
	
</body>
</html>