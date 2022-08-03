<?php
$gid = _if($_GET['g']);
$rs=$DB->query("select * from if_goods where id =".$gid);
if($row = $DB->fetch($rs)){
    
}else{
    exit("<script language='javascript'>window.location.href='./index.php';</script>");
}
$c = $DB->count("SELECT COUNT(id) from if_km  where stat = 0 and gid =".$row['id']);

$typers=$DB->query("select * from if_type where id =".$row['tpId']);
$typerow = $DB->fetch($typers);
//    $select.="<option id='".$row['id']."' imgs='".$row['imgs']."' value='".$row['gName']."'kc='".$c."'  title='".$row['price']."' alt = '".$row['gInfo']."'>".$row['gName']."</option>";



$yxts=ceil((time()-strtotime($conf['create']))/86400); //本站已运行多少天

$allOrder = $DB->count("SELECT  id  from if_order order by id DESC limit 1");
//历史订单数
$nowOrder = $DB->count("SELECT COUNT(id)  from if_order order by id DESC limit 1");
//当前订单数
$okOrder = $DB->count("SELECT COUNT(id)   from if_order where sta = 1 order by id DESC limit 1");
//完成订单数

if(strpos($_SERVER['HTTP_USER_AGENT'], 'QQ/')!==false && $conf['qqtz']==1){
    header("Content-Type: text/html; charset=utf-8");
    echo '<!DOCTYPE html>
    <html>
     <head>
      <title>请使用浏览器打开</title>
      <script src="https://open.mobile.qq.com/sdk/qqapi.js?_bid=152"></script>
      <script type="text/javascript"> mqq.ui.openUrl({ target: 2,url: "'.$siteurl.'"}); </script>
     </head>
     <body></body>
    </html>';
     exit;
}


?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title><?php echo $conf['title'];?></title>
  <meta name="keywords" content="<?php echo $conf['keywords'];?>">
  <meta name="description" content="<?php echo $conf['description'];?>">
  <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
   <link href="//cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
  
  <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/4.png" media="screen" />
  <script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
  <script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="//cdn.bootcss.com/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
  <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="layer/layer.js"></script>

  <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
  <script src="js/if.js"></script>
  <script type="text/javascript">
 
  </script>
<style>
img.logo{width:14px;height:14px;margin:0 5px 0 3px;}
body{
	background-image: url("assets/imgs/bj3.jpg");
	background-size:100%;
}
</style>
</head>
<body>



<div style="height: 20px;">

</div>
<div class="container" >
<div class="col-xs-12 col-sm-10 col-md-8 col-lg-9 center-block" style="float: none;">
<div class="panel panel-default" style="border: 2px solid #63B8FF;">
    <div class="panel-body" style="text-align: center;" >
<img alt="" height="82px" src="assets/imgs/logo.png">

</div>
</div>

<div class="panel panel-primary">
<div class="panel-body" style="text-align: center;">
<div class="panel panel-info">
						<div class="list-group-item reed" style="background: #66bdff;">
							<h3 class="panel-title">
								<font color="#fff"><i class="fa fa-volume-up"></i>&nbsp;&nbsp;<b>购买须知<用户必看></b></font>
							</h3>
						</div>
						<table class="table table-bordered">
							<tbody>
								<tr>
									<td align="center"><font color="#808080">本站域名：<?php echo $_SERVER['HTTP_HOST']?></font></td>
									<td align="center"><font color="#808080">客服QQ:<?php echo $conf['zzqq']?></font></td>
								</tr>
								
							</tbody>
						</table>
						<div class="list-group-item reed">
							
							<font style="color:#009ACD;font-weight: bold;"><?php echo $conf['notice1']?></font>
						</div>
						<div class="list-group-item reed">
							<font style="color:#556B2F;font-weight: bold;"><?php echo $conf['notice2']?></font>
						</div>
						<div class="list-group-item reed">
							<font style="color:#008B00;font-weight: bold;"><?php echo $conf['notice3']?></font>
						</div>
						

		</div>
	<div class="list-group">
			
		<ul class="nav nav-tabs">
			<li class="active"><a href="#onlinebuy" data-toggle="tab">商品专属链接下单</a></li>
			<li><a href="index.php" >购买其他商品</a></li>
		</ul>
		<div class="list-group-item">
			<div id="myTabContent" class="tab-content">
			<div class="tab-pane fade in active" id="onlinebuy">
				<div class="form-group">
					<div class="input-group"><div class="input-group-addon">商品分类</div>
					<select name="tp_id" id="tp_tid" class="form-control" onchange="">
					   <option selected><?php echo $typerow['tName'];?></option>
					</select>
				</div></div>
				<div class="form-group">
					<div class="input-group"><div class="input-group-addon">选择商品</div>
					<select name="gid" id="gid" class="form-control" onchange="">
					   <option selected id="<?php echo $row['id'];?>" title ="<?php echo $row['price'];?>"><?php echo  $row['gName']?></option>
					</select>
				</div></div>
				<?php if($conf['showImgs'] == 1){?>
				<div class="form-group">
					
					<img id="goodimgs" src="<?php echo $row['imgs'];?>"  class="img-responsive img-rounded img-thumbnail" style="max-height: 200px;">
				   
				</div>
				<?php }?>
				<div class="form-group">
					<div class="panel panel-default">
                    <div class="panel-body" id="">
                            <?php if(empty($row['gInfo']) || $row['gInfo'] == "" ){
                                echo "当前商品无介绍";
                            }else{
                                echo $row['gInfo'];
                            }?>
                    </div>
                   
                     </div>
				</div></div>
				<div class="form-group">
					<div class="input-group"><div class="input-group-addon">商品价格</div>
					<input type="text" name="need" id="need" class="form-control" value="<?php echo $row['price'];?>" disabled/>
				</div></div>
				
				<div class="form-group" style="<?php if($conf['showKc'] == 2) echo "display:none;"?> ">
					<div class="input-group"><div class="input-group-addon">商品库存</div>
					<input type="text" name="kc" id="kc" class="form-control" value="<?php echo $c;?>" disabled/>
				</div></div>
			
				<div class="form-group">
					<div class="input-group"><div class="input-group-addon">联系方式</div>
					<input type="text" name="lx" id="lx" value="" class="form-control" placeholder="输入您的QQ,您的QQ号码也可以作为您的提取密码" required/>
				</div></div>
				
				<div class="input-group">
                        <div class="input-group"><div class="input-group-addon">选择数量</div>
					<div class="input-group-addon btn btn-primary" id="jia" onclick='numstepUp()'>+</div>
                       <input type="number" onBlur="checknum()"  name="number" id="number" class="form-control " placeholder="" min="1" step="1" value="1" required>
                      <div class="input-group-addon btn btn-primary" id="jian"  onclick='numstepDown()'>-</div>
                      
				</div><br>
                       
                </div>
				
				<div class="form-group">
			     <span class="btn btn-default btnSpan" title="alipay"><input type="radio" name="type" value="alipay" class="pay" id="alipay" value="alipay" title="支付宝" ><img alt="" src="assets/alipay.ico" class="logo">支付宝</span>
			     <?php 
			         if($conf['paiapi'] != 5){
			     ?>
			     <span class="btn btn-default btnSpan" title="qqpay"><input type="radio" name="type" value="qqpay"  class="pay" id="qqpay" value="qqpay" title="QQ钱包" ><img alt="" src="assets/qqpay.ico" class="logo">QQ</span>
			     <span class="btn btn-default btnSpan" title="tenpay" style="display: none"><input type="radio" name="type" value="tenpay" class="pay" id="tenpay" value="tenpay" title="财付通" ><img alt="" src="assets/tenpay.ico" class="logo">财付通</span>
			     <span class="btn btn-default btnSpan"  title="wxpay"><input type="radio" name="type" value="wxpay" class="pay" id="wxpay" value="wxpay" title="微信" ><img alt="" src="assets/wechat.ico" class="logo">微信</span>
			     <?php }?>
			    </div>
			
				</div>
				<input type="submit" id="submit_buy" class="btn btn-primary btn-block" value="立即购买">
			</div>
			
			
			
		</div>
		<div class="panel panel-info">
		<div class="list-group-item reed" style="background:#3B3B3B;">
							<h3 class="panel-title">
								<font color="#fff"><i class="fa fa-podcast"></i>&nbsp;&nbsp;<b>本站更多功能</b></font>
							</h3>
						</div>
		<div class="list-group-item reed">
			<font style="color:#008B00;font-weight: bold;">
			<a href="./auto.php"><span class="btn btn-danger btn-xs"><b>自助补单</b></span></a>&nbsp;|&nbsp;<a href="index.php?tp=default&action=getallkm"><span class="btn btn-info btn-xs"><b>查询历史订单信息</b></span></a>
			</font>
		</div>
		</div>
		
<div class="panel panel-info">
<div class="list-group-item reed" style="background:#64b2ca;"><h3 class="panel-title"><font color="#fff"><i class="fa fa-bar-chart"></i>&nbsp;&nbsp;<b>运行日志</b></font></h3></div>
<table class="table table-bordered">
<tbody>
<tr>
	<td align="center"><font color="#808080"><b>平台已经运营</b><br><i class="fa fa-ravelry fa-2x"></i><br><?php echo $yxts;?>天</font></td>
	<td align="center"><font color="#808080"><b>平台订单总数</b><br><span class="fa fa-free-code-camp fa-2x"></span><br><?php echo $nowOrder;?>条</font></td>
</tr>
<tr height=50>
         <td align="center"><font color="#808080"><b>成功交易订单</b><br><i class="fa  fa-handshake-o fa-2x"></i><br><?php echo $okOrder;?>条</font></td>
	<td align="center"><font color="#808080">
	<b>历史总订单</b><br>
	<i class="fa fa-telegram fa-2x"></i>
	<br>
	<span id="counter"><?php $allOrder==null? $ar = 0:$ar = $allOrder; echo $ar;?></span>条</font></td>
<tbody>
</table>
</div>
		
		<hr/>
		<div class="container-fluid">
			
			<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $conf['zzqq']?>&site=qq&menu=yes" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-user"></span> 联系客服</a>
		</div>
		<br>
		<span>Copyright © 2018 <?php echo $conf['foot']?></span>
		
		
		
		</div>
	</div>
</div>
</div>

</body>
</html>