<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Fishing Tackle Store">
    <title>Tackle Tips- Fishing Tackle Store</title>

    <link rel="shortcut icon" href="{{ URL::to('/') }}/front-end/assets/img/favicon.png">
    <link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/css/bootstrap-select.min.css" type="text/css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/fonts/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/fonts/line-icons/line-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/css/main.css" type="text/css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/css/settings.css" type="text/css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/css/animate.css" type="text/css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/css/owl.theme.css" type="text/css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/css/component.css" type="text/css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/css/slicknav.css" type="text/css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/css/responsive.css" type="text/css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/css/slick.css" type="text/css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/css/slick-theme.css" type="text/css">
</head>

<body>

  @include('front-end/includes/header')




   <div class="ttm-page-title ttm-bg clearfix" style="background-image: url('{{ URL::to('/') }}/front-end/assets/img/banner/01.jpg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="ttm-page-title-row-inner">
                        <div class="page-title-heading">
                            <h2 class="title">Payment!</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div id="content" class="product-area">
<div class="container">
<div class="row">
   

<div class="col-md-5 col-sm-6 col-sx-12" style="padding-bottom:50px;">
<div class="card  card--padding fill-bg">
<table class="table-total-checkout">
<tbody>
    <tr>
<th colspan="2" class="priceinfodetalis">Price Info</th>
<!--<td><span id="oder_total"></span></td>-->
</tr>
<tr>
<th class="priceinfo">Price:</th>
<td><span id="oder_total"></span></td>
</tr>
<tr>
<th class="priceinfo">Delivery Chargess:</th>
<td><span id="oder_total"></span></td>
</tr>



<tr>
<tr>
<th class="totalprice" >GRAND TOTAL:<button type="button" onclick="pay()" class="btn">Pay</button></th>
<td style="text-align:left;" class="totalpricegrand"><span id="oder_total">₹{{number_format($net_total, 2, '.', ',')}}</span></td>
</tr>
</tbody>
</table>
	<form method="POST" name="customerData" action="ccavRequestHandler.php">
	     @csrf
	      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
		<!--<table width="40%" height="100" border='1' align="center"><caption><font size="4" color="blue"></font></caption></table>-->
			<table width="100%" height="100" border='1' align="center">
			
			
			<input type="hidden" name="tid" id="tid" readonly />
				
				
		<input type="hidden" name="merchant_id" value="2246391" readonly/>
				
			
				<input type="hidden" name="order_id" value="{{$order_id}}"/>
				
				
					<input type="hidden" name="amount" value="{{$net_total}}"/>
		
			
				<input type="hidden" name="currency" value="INR"/>
			
			
					<input type="hidden" name="redirect_url" value="https://tackletips.in/ccavResponseHandler.php"/>
			 	<input type="hidden" name="cancel_url" value="https://tackletips.in/ccavResponseHandler.php"/>
			 	
			 	<!--<input type="hidden" name="redirect_url" value="https://tackletips.in/ccavenue/callback"/>-->
			 	<!--<input type="hidden" name="cancel_url" value="https://tackletips.in/ccavenue/callback"/>-->
			 
		
					<input type="hidden" name="language" value="EN"/></td>
			
		     	
		        <tr>
		        	<td>Billing Name	:</td>
		        	
		        	<td><input style="border:none;" type="text" name="billing_name" value="{{$customer->customer_name}}"/></td>
		        </tr>
		        <tr>
		        	<td>Billing Address	:</td><td><input style="border:none;" type="text" name="billing_address" value="{{$customer->shipping_address}}"/></td>
		        </tr>
		        <tr>
		        	<td>Billing City	:</td><td><input  style="border:none;" type="text" name="billing_city" value="{{$customer->shipping_city}}"/></td>
		        </tr>
		        <tr>
		        	<td>Billing State	:</td><td><input style="border:none;" type="text" name="billing_state" value="KL"/></td>
		        </tr>
		        <tr>
		        	<td>Billing Zip	:</td><td><input style="border:none;" type="text" name="billing_zip" value="{{$customer->shipping_pin}}"/></td>
		        </tr>
		        <tr>
		        	<td>Billing Country	:</td><td><input style="border:none;"  type="text" name="billing_country" value="India"/></td>
		        </tr>
		        <tr>
		        	<td>Billing Tel	:</td><td><input type="text" style="border:none;"  name="billing_tel" id="billing_tel" value="9999999999" required />
		        	  <span id="errmsg" style="color:red;"></td>
		        </tr>
		        <tr>
		        	<td>Billing Email	:</td><td><input style="border:none;" type="text" name="billing_email" value="test@test.com"/></td>
		        </tr>
		      
			
		         
		      
			        <tr>
			        	 <td id="processing_fee" colspan="2">
			        	</td>
			        </tr>
			        </table>
		        </div>
		       
		        </tr>
		    
		         
		        
		          <tr>	
		        	<br>
		        	<td>
		        	    <input   style="background: #000;
color: #fff;
border: #000;
padding: 6px;" type="submit" value="CheckOut" onclick="ValidateMobileNumber()"></td>


		        </tr>
	      	</table>
	      </form>
<!--<form method="POST" name="customerData" action="ccavRequestHandler.php">-->
	
<!--			<table width="50%" height="100" border='1' align="center" style="display:none">-->
			
<!--				<tr>-->
<!--					<td colspan="2"> Compulsory information</td>-->
<!--				</tr>-->
<!--				<tr>-->
<!--					<td>TID	:</td><td><input type="hidden" name="tid" id="tid" readonly /></td>-->
<!--				</tr>-->
<!--				<tr>-->
<!--				<td>Merchant Id	:</td><td><input type="hidden" name="merchant_id" value="2246391"/></td>-->
<!--				</tr>-->
<!--				<tr>-->
<!--					<td>Order Id	:</td><td><input type="hidden" name="order_id" value="{{$order_id}}"/></td>-->
<!--				</tr>-->
<!--				<tr>-->
<!--					<td>Amount	:</td><td><input type="hidden" name="amount" value="{{$net_total}}"/></td>-->
<!--				</tr>-->
<!--				<tr>-->
<!--					<td>Currency	:</td><td><input type="hidden" name="currency" value="INR"/></td>-->
<!--				</tr>-->
<!--				<tr>-->
<!--					<td>Redirect URL	:</td><td><input type="hidden" name="redirect_url" value="https://tackletips.in/redirect/status"/></td>-->
<!--				</tr>-->
<!--			 	<tr>-->
<!--			 		<td>Cancel URL	:</td><td><input type="hidden" name="cancel_url" value="https://tackletips.in/redirect/cancel"/></td>-->
<!--			 	</tr>-->
<!--			 	<tr>-->
<!--					<td>Language	:</td><td><input type="hidden" name="language" value="EN"/></td>-->
<!--				</tr>-->
<!--		     	<tr>-->
<!--		     		<td colspan="2">Billing information(optional):</td>-->
<!--		     	</tr>-->
<!--		        <tr>-->
<!--		        	<td>Billing Name	:</td><td><input type="text" name="billing_name" value="{{$customer->customer_name}}"/></td>-->
<!--		        </tr>-->
<!--		        <tr>-->
<!--		        	<td>Billing Address	:</td><td><input type="text" name="billing_address" value="{{$customer->shipping_address}}"/></td>-->
<!--		        </tr>-->
<!--		        <tr>-->
<!--		        	<td>Billing City	:</td><td><input type="text" name="billing_city" value="{{$customer->shipping_city}}"/></td>-->
<!--		        </tr>-->
<!--		        <tr>-->
<!--		        	<td>Billing State	:</td><td><input type="text" name="billing_state" value="KL"/></td>-->
<!--		        </tr>-->
<!--		        <tr>-->
<!--		        	<td>Billing Zip	:</td><td><input type="text" name="billing_zip" value="{{$customer->shipping_pin}}"/></td>-->
<!--		        </tr>-->
<!--		        <tr>-->
<!--		        	<td>Billing Country	:</td><td><input type="text" name="billing_country" value="India"/></td>-->
<!--		        </tr>-->
<!--		        <tr>-->
<!--		        	<td>Billing Tel	:</td><td><input type="text" name="billing_tel" value="{{$customer->customer_mobile}}"/></td>-->
<!--		        </tr>-->
<!--		        <tr>-->
<!--		        	<td>Billing Email	:</td><td><input type="text" name="billing_email" value="{{$customer->customer_email}}"/></td>-->
<!--		        </tr>-->
		       
		         
<!--		          EMI section start -->
		         

			
			 
<!--			        </table>-->
<!--		        </div>-->
<!--		        </td>-->
<!--		        </tr>-->
<!--		         EMI section end -->
		         
		         
		
				 
<!--		        <tr>-->
<!--		        	<td></td><td></td>-->
<!--		        </tr>-->
<!--	      	</table>-->
<!--	      	<INPUT TYPE="submit" value="CheckOut">-->
<!--	      </form>-->

    <!--  <form style="text-align: center;" action="{{ route('razorpay.payment.store') }}" method="POST" >-->
    <!--                                @csrf-->
    <!--                                <input style="background: #333333;-->
    <!--border: 1px solid #333333;-->
    <!--color: white;" type="hidden" name="order_id" value="{{$order_id}}">-->
    <!--                                <script src="https://checkout.razorpay.com/v1/checkout.js"-->
    <!--                                        data-key="{{ env('RAZORPAY_KEY') }}"-->
    <!--                                        data-amount="{{$net_total*100}}"-->
    <!--                                        data-buttontext="Payment Now"-->
    <!--                                        data-name="Tackle"-->
    <!--                                        data-description="Rozorpay"-->
    <!--                                        data-image="{{ URL::to('/') }}/front-end/assets/img/logo.png"-->
    <!--                                        data-prefill.name="name"-->
    <!--                                        data-prefill.email="email"-->
    <!--                                        data-theme.color="#fff"-->
    <!--                                        data.theme.background:"#333333"-->
                                            
    <!--                                        >-->
    <!--                                </script>-->
    <!--                            </form>-->
<!-- <button type="submit" class="btn btn-common btn-full">Place Order Now <span class="icon-action-redo"></span></button> -->
</div>


<div class="col-md-7">
    <div class="paymentimg">
    <img src="{{ URL::to('/') }}/front-end/assets/img/paymentimage.png">
    </div>
</div>

</div>

</div>
</div>
</div>

   @include('front-end/includes/footer')





</body>
<script language="javascript" type="text/javascript" src="{{url('json.js')}}"></script>
 <script src="{{url('jquery-1.7.2.min.js')}}"></script>
<script type="text/javascript">
   $(document).ready(function () {
           function ValidateMobileNumber() {
        var mobileNumber = $("#billing_tel").val();
        var lblError = document.getElementById("errmsg");
        lblError.innerHTML = "";
        var expr = /^(0|91)?[6-9][0-9]{9}$/;
        if (!expr.test(mobileNumber)) {
            lblError.innerHTML = "Invalid Mobile Number.";
        }
    }
         $("#billing_tel").keypress(function (e) {
        
   //if the letter is not digit then display error and don't type anything
        
   if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
           
   //display error message
           
   $("#errmsg").html("Digits Only").show().fadeOut("slow");
                  
   return false;
       }
      
   });
   });
  $(function(){
  
	 /* json object contains
	 	1) payOptType - Will contain payment options allocated to the merchant. Options may include Credit Card, Net Banking, Debit Card, Cash Cards or Mobile Payments.
	 	2) cardType - Will contain card type allocated to the merchant. Options may include Credit Card, Net Banking, Debit Card, Cash Cards or Mobile Payments.
	 	3) cardName - Will contain name of card. E.g. Visa, MasterCard, American Express or and bank name in case of Net banking. 
	 	4) status - Will help in identifying the status of the payment mode. Options may include Active or Down.
	 	5) dataAcceptedAt - It tell data accept at CCAvenue or Service provider
	 	6)error -  This parameter will enable you to troubleshoot any configuration related issues. It will provide error description.
	 */	  
  	  var jsonData;
  	  var access_code="AVUA44KC80CL79AULC" // shared by CCAVENUE 
	  var amount="6000.00";
  	  var currency="INR";
  	  
      $.ajax({
           url:'https://secure.ccavenue.com/transaction/transaction.do?command=getJsonData&access_code='+access_code+'&currency='+currency+'&amount='+amount,
           dataType: 'jsonp',
           jsonp: false,
           jsonpCallback: 'processData',
           success: function (data) { 
                 jsonData = data;
                 // processData method for reference
                 processData(data); 
		 // get Promotion details
                 $.each(jsonData, function(index,value) {
			if(value.Promotions != undefined  && value.Promotions !=null){  
				var promotionsArray = $.parseJSON(value.Promotions);
		               	$.each(promotionsArray, function() {
					console.log(this['promoId'] +" "+this['promoCardName']);	
					var	promotions=	"<option value="+this['promoId']+">"
					+this['promoName']+" - "+this['promoPayOptTypeDesc']+"-"+this['promoCardName']+" - "+currency+" "+this['discountValue']+"  "+this['promoType']+"</option>";
					$("#promo_code").find("option:last").after(promotions);
				});
			}
		});
           },
           error: function(xhr, textStatus, errorThrown) {
               alert('An error occurred! ' + ( errorThrown ? errorThrown :xhr.status ));
               //console.log("Error occured");
           }
   		});
   		
   		$(".payOption").click(function(){
   			var paymentOption="";
   			var cardArray="";
   			var payThrough,emiPlanTr;
		    var emiBanksArray,emiPlansArray;
   			
           	paymentOption = $(this).val();
           	$("#card_type").val(paymentOption.replace("OPT",""));
           	$("#card_name").children().remove(); // remove old card names from old one
            $("#card_name").append("<option value=''>Select</option>");
           	$("#emi_div").hide();
           	
           	//console.log(jsonData);
           	$.each(jsonData, function(index,value) {
           		//console.log(value);
            	  if(paymentOption !="OPTEMI"){
	            	 if(value.payOpt==paymentOption){
	            		cardArray = $.parseJSON(value[paymentOption]);
	                	$.each(cardArray, function() {
	    	            	$("#card_name").find("option:last").after("<option class='"+this['dataAcceptedAt']+" "+this['status']+"'  value='"+this['cardName']+"'>"+this['cardName']+"</option>");
	                	});
	                 }
	              }
	              
	              if(paymentOption =="OPTEMI"){
		              if(value.payOpt=="OPTEMI"){
		              	$("#emi_div").show();
		              	$("#card_type").val("CRDC");
		              	$("#data_accept").val("Y");
		              	$("#emi_plan_id").val("");
						$("#emi_tenure_id").val("");
						$("span.emi_fees").hide();
		              	$("#emi_banks").children().remove();
		              	$("#emi_banks").append("<option value=''>Select your Bank</option>");
		              	$("#emi_tbl").children().remove();
		              	
	                    emiBanksArray = $.parseJSON(value.EmiBanks);
	                    emiPlansArray = $.parseJSON(value.EmiPlans);
	                	$.each(emiBanksArray, function() {
	    	            	payThrough = "<option value='"+this['planId']+"' class='"+this['BINs']+"' id='"+this['subventionPaidBy']+"' label='"+this['midProcesses']+"'>"+this['gtwName']+"</option>";
	    	            	$("#emi_banks").append(payThrough);
	                	});
	                	
	                	emiPlanTr="<tr><td>&nbsp;</td><td>EMI Plan</td><td>Monthly Installments</td><td>Total Cost</td></tr>";
							
	                	$.each(emiPlansArray, function() {
		                	emiPlanTr=emiPlanTr+
							"<tr class='tenuremonth "+this['planId']+"' id='"+this['tenureId']+"' style='display: none'>"+
								"<td> <input type='radio' name='emi_plan_radio' id='"+this['tenureMonths']+"' value='"+this['tenureId']+"' class='emi_plan_radio' > </td>"+
								"<td>"+this['tenureMonths']+ "EMIs. <label class='merchant_subvention'>@ <label class='emi_processing_fee_percent'>"+this['processingFeePercent']+"</label>&nbsp;%p.a</label>"+
								"</td>"+
								"<td>"+this['currency']+"&nbsp;"+this['emiAmount'].toFixed(2)+
								"</td>"+
								"<td><label class='currency'>"+this['currency']+"</label>&nbsp;"+ 
									"<label class='emiTotal'>"+this['total'].toFixed(2)+"</label>"+
									"<label class='emi_processing_fee_plan' style='display: none;'>"+this['emiProcessingFee'].toFixed(2)+"</label>"+
									"<label class='planId' style='display: none;'>"+this['planId']+"</label>"+
								"</td>"+
							"</tr>";
						});
						$("#emi_tbl").append(emiPlanTr);
	                 } 
                  }
           	});
           	
         });
   
	  
      $("#card_name").click(function(){
      	if($(this).find(":selected").hasClass("DOWN")){
      		alert("Selected option is currently unavailable. Select another payment option or try again later.");
      	}
      	if($(this).find(":selected").hasClass("CCAvenue")){
      		$("#data_accept").val("Y");
      	}else{
      		$("#data_accept").val("N");
      	}
      });
          
     // Emi section start      
          $("#emi_banks").live("change",function(){
	           if($(this).val() != ""){
	           		var cardsProcess="";
	           		$("#emi_tbl").show();
	           		cardsProcess=$("#emi_banks option:selected").attr("label").split("|");
					$("#card_name").children().remove();
					$("#card_name").append("<option value=''>Select</option>");
				    $.each(cardsProcess,function(index,card){
				        $("#card_name").find("option:last").after("<option class=CCAvenue value='"+card+"' >"+card+"</option>");
				    });
					$("#emi_plan_id").val($(this).val());
					$(".tenuremonth").hide();
					$("."+$(this).val()+"").show();
					$("."+$(this).val()).find("input:radio[name=emi_plan_radio]").first().attr("checked",true);
					$("."+$(this).val()).find("input:radio[name=emi_plan_radio]").first().trigger("click");
					 
					 if($("#emi_banks option:selected").attr("id")=="Customer"){
						$("#processing_fee").show();
					 }else{
						$("#processing_fee").hide();
					 }
					 
				}else{
					$("#emi_plan_id").val("");
					$("#emi_tenure_id").val("");
					$("#emi_tbl").hide();
				}
				
				
				
				$("label.emi_processing_fee_percent").each(function(){
					if($(this).text()==0){
						$(this).closest("tr").find("label.merchant_subvention").hide();
					}
				});
				
		 });
		 
		 $(".emi_plan_radio").live("click",function(){
			var processingFee="";
			$("#emi_tenure_id").val($(this).val());
			processingFee=
					"<span class='emi_fees' >"+
			 			"Processing Fee:"+$(this).closest('tr').find('label.currency').text()+"&nbsp;"+
			 			"<label id='processingFee'>"+$(this).closest('tr').find('label.emi_processing_fee_plan').text()+
			 			"</label><br/>"+
                			"Processing fee will be charged only on the first EMI."+
                	"</span>";
             $("#processing_fee").children().remove();
             $("#processing_fee").append(processingFee);
             
             // If processing fee is 0 then hiding emi_fee span
             if($("#processingFee").text()==0){
             	$(".emi_fees").hide();
             }
			  
		});
		
		
		$("#card_number").focusout(function(){
			/*
			 emi_banks(select box) option class attribute contains two fields either allcards or bin no supported by that emi 
			*/ 
			if($('input[name="payment_option"]:checked').val() == "OPTEMI"){
				if(!($("#emi_banks option:selected").hasClass("allcards"))){
				  if(!$('#emi_banks option:selected').hasClass($(this).val().substring(0,6))){
					  alert("Selected EMI is not available for entered credit card.");
				  }
			   }
		   }
		  
		});
			
			
	// Emi section end 		
   
   
   // below code for reference 
 
   function processData(data){
         var paymentOptions = [];
         var creditCards = [];
         var debitCards = [];
         var netBanks = [];
         var cashCards = [];
         var mobilePayments=[];
         $.each(data, function() {
         	 // this.error shows if any error   	
             console.log(this.error);
              paymentOptions.push(this.payOpt);
              switch(this.payOpt){
                case 'OPTCRDC':
                	var jsonData = this.OPTCRDC;
                 	var obj = $.parseJSON(jsonData);
                 	$.each(obj, function() {
                 		creditCards.push(this['cardName']);
                	});
                break;
                case 'OPTDBCRD':
                	var jsonData = this.OPTDBCRD;
                 	var obj = $.parseJSON(jsonData);
                 	$.each(obj, function() {
                 		debitCards.push(this['cardName']);
                	});
                break;
              	case 'OPTNBK':
	              	var jsonData = this.OPTNBK;
	                var obj = $.parseJSON(jsonData);
	                $.each(obj, function() {
	                 	netBanks.push(this['cardName']);
	                });
                break;
                
                case 'OPTCASHC':
                  var jsonData = this.OPTCASHC;
                  var obj =  $.parseJSON(jsonData);
                  $.each(obj, function() {
                  	cashCards.push(this['cardName']);
                  });
                 break;
                   
                  case 'OPTMOBP':
                  var jsonData = this.OPTMOBP;
                  var obj =  $.parseJSON(jsonData);
                  $.each(obj, function() {
                  	mobilePayments.push(this['cardName']);
                  });
              }
              
            });
           
           //console.log(creditCards);
          // console.log(debitCards);
          // console.log(netBanks);
          // console.log(cashCards);
         //  console.log(mobilePayments);
            
      }
  });
</script>

</html>
