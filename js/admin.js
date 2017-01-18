//-----------admin use---------------
function seedling_price(){
	document.getElementById('myIframe').src = 'admin_use/seedling_price.php';
}
function transaction_details() {
    document.getElementById('myIframe').src = 'admin_use/transaction_details.php';
}
function add_remove(){
    document.getElementById('myIframe').src = 'admin_use/add_remove.php';
}
function seedling_stock(){
    document.getElementById('myIframe').src = 'admin_use/seedling_stock.php';
}
function profile(){
    document.getElementById('myIframe').src = 'admin_use/profile.php';
}




//-------------other user use----------------
function present_stock(){
	document.getElementById('myIframe').src = 'other_use/present_stock.php?user='+login_user+'&nursery='+nursery;
}
function stock_sale_enquiry(){
    document.getElementById('myIframe').src = 'other_use/stock_sale_enquiry.php?user='+login_user+'&nursery='+nursery;
}
function nursery_trade_record(){
	document.getElementById('myIframe').src = 'other_use/nursery_trade_record.php?user='+login_user+'&nursery='+nursery;
}