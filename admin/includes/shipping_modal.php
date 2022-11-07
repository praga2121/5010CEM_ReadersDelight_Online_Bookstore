<!-- Shipment Details -->
<div class="modal fade" id="transaction">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Transaction and Shipping Full Details</b></h4>
            </div>
            <div class="modal-body">
              <p>Transaction Date: <span id="date"></span></p>
              <p>Transaction ID: <span id="transid"></span></p>
              <p>Expected Delivery Date: <span id="ship_date"></span></p>
              <p>Delivery Status: <span style="" id="ship_status"></span></p>
              <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.1.min.js"> //for coloring the status text
                $(document).ready(function(){
                  var ship_status = $(#ship_status).data();
                  if(ship_status === "Preparing for Shipment"){
                    $(#ship_status).attr("style", "color:#808080;");
                  }
                  else if(ship_status ==="Shipment On the Way"){
                    $(#ship_status).attr("style", "color:#000000;");
                  }
                  else if(ship_status ==="Delivered"){
                    $(#ship_status).attr("style", "color:#00FF00;");
                  }
                  else{
                    $(#ship_status).attr("style", "color:#FF0000;");
                  }
                });
              </script>

              <table class="table table-bordered">
                <thead>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Subtotal</th>
                </thead>
                <tbody id="detail">
                  <tr>
                    <td colspan="3" align="right"><b>Total</b></td>
                    <td><span id="total"></span></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>