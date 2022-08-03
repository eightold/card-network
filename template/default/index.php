<?php
if(empty($conf['create'])){
    $DB->query("insert into if_config values('create',now())");
}
$yxts=ceil((time()-strtotime($conf['create']))/86400); //本站已运行多少天

$allOrder = $DB->count("SELECT  id  from if_order order by id DESC limit 1");
//历史订单数
$nowOrder = $DB->count("SELECT COUNT(id)  from if_order order by id DESC limit 1");
//当前订单数
$okOrder = $DB->count("SELECT COUNT(id)   from if_order where sta = 1 order by id DESC limit 1");
//完成订单数



$rs=$DB->query("select * from if_type");
$select = "";
while ($row = $DB->fetch($rs)){
    $select.='<option value="'.$row['id'].'">'.$row['tName'].'</option>';
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
      <link rel="icon" type="image/png" href="assets/if/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/if/i/app-icon72x72@2x.png">
    <link rel="stylesheet" href="assets/if/css/amazeui.min.css" />
    <link rel="stylesheet" href="assets/if/css/admin.css">
    <link rel="stylesheet" href="assets/if/css/app.css">
    <script src="assets/if/js/echarts.min.js"></script>
  <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="layer/layer.js"></script>

  <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
  <script src="js/if.js"></script>
  <script type="text/javascript">
  $(function(){
	 
		//获取商品
	  getPoint($("#tp_tid"));
	
		
})
 
  </script>

</head>
<body>

<body data-type="index">



    <header class="am-topbar am-topbar-inverse admin-header">
        <div class="am-topbar-brand">
            <a href="javascript:;" class="tpl-logo">
                <img src="assets/imgs/logo.png" alt="">
            </a>
        </div>
        <div class="am-icon-list tpl-header-nav-hover-ico am-fl am-margin-right">

        </div>
            </ul>
        </div>
    </header>







    <div class="tpl-page-container tpl-page-header-fixed">


        <div class="tpl-left-nav tpl-left-nav-hover">
            <div class="tpl-left-nav-title">
               <?php echo $conf['title'];?>
            </div>
            <div class="tpl-left-nav-list">
                <ul class="tpl-left-nav-menu">
                    <li class="tpl-left-nav-item">
                        <a href="/" class="nav-link active">
                            <i class="am-icon-home"></i>
                            <span>首页</span>
                        </a>
                    </li>
                    <li class="tpl-left-nav-item">
                        <a href="?tp=default&action=getkm" class="nav-link tpl-left-nav-link-list">
                            <i class="am-icon-bar-chart"></i>
                            <span>订单查询</span>
                            <i class="tpl-left-nav-content tpl-badge-danger">
               99+
             </i>
                        </a>
                    <li class="tpl-left-nav-item">
                        <a href="http://pay.xyctc.top/zf/" target="_black" class="nav-link tpl-left-nav-link-list">
                            <i class="am-icon-key"></i>
                    <span>宜信益付-免签约支付</span></a>                  </li>
                  <li class="tpl-left-nav-item">
                        <a href="http://www.59ds.cc" target="_black" class="nav-link tpl-left-nav-link-list">
                            <i class="am-icon-key"></i>
                            <span>代刷平台</span>

                        </a>
                    </li>
                </ul>
            </div>
        </div>



        <div class="tpl-content-wrapper">
            <div class="tpl-content-scope">
                <div class="note note-info">
                  <h3>购买须知</h3>
                        <span class="close" data-close="note"></span>
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
                              <div class="tpl-content-scope">
                <div class="note note-info">
	<div class="list-group">
			<h3>在线下单</h3>
		<ul class="nav nav-tabs">
			<li class="active"><a href="#onlinebuy" data-toggle="tab">在线购买下单</a></li>
			<li><a href="index.php?tp=default&action=getkm" >订单查询提卡</a></li>
			<li><a href="index.php?tp=default&action=getallkm" >查询历史订单</a></li>
		</ul>
		<div class="list-group-item">
			<div id="myTabContent" class="tab-content">
			<div class="tab-pane fade in active" id="onlinebuy">
				<div class="form-group">
					<div class="input-group"><div class="input-group-addon">商品分类</div>
					<select name="tp_id" id="tp_tid" class="form-control" onchange="getPoint(this);"><?php echo $select?></select>
				</div></div>
				<div class="form-group">
					<div class="input-group"><div class="input-group-addon">选择商品</div>
					<select name="gid" id="gid" class="form-control" onchange="getPrice(this)">
					
					</select>
				</div></div>
				<?php if($conf['showImgs'] == 1){?>
				<div class="form-group">
					
					<img id="goodimgs" src="./assets/goodsimg/df.jpg"  class="img-responsive img-rounded img-thumbnail" style="max-height: 200px;">
				   
				</div>
				<?php }?>
				<div class="form-group">
					<div class="panel panel-default">
                    <div class="panel-body" id="ginfo">
                    </div>
                   
                </div>
				</div></div>
				<div class="form-group">
					<div class="input-group"><div class="input-group-addon">商品价格</div>
					<input type="text" name="need" id="need" class="form-control" disabled/>
				</div></div>
				
				<div class="form-group" style="<?php if($conf['showKc'] == 2) echo "display:none;"?> ">
					<div class="input-group"><div class="input-group-addon">商品库存</div>
					<input type="text" name="kc" id="kc" class="form-control" disabled/>
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
<?php if($conf['syslog'] == 1){ ?>
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
<?php }?>
		
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