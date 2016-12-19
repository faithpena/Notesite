function change(quantity, id, max) {
	if (Number(parseFloat(quantity)) == quantity && quantity <= max && quantity > 1)
	{
		$.ajax({
	        type: "POST",
	        url: "controller/update_quantity.php",
	        data: "quantity=" + quantity + "&id=" + id,
	        success: function(result) {
	            var myNode = document.getElementById("mytable");
				while (myNode.firstChild) {
				    myNode.removeChild(myNode.firstChild);
				}

				var node = document.createElement("th");
				var textnode = document.createTextNode("Item");
				node.appendChild(textnode);
				myNode.appendChild(node);

				var node = document.createElement("th");
				var textnode = document.createTextNode("Qty");
				node.appendChild(textnode);
				myNode.appendChild(node);

				var node = document.createElement("th");
				var textnode = document.createTextNode("Subtotal");
				node.appendChild(textnode);
				myNode.appendChild(node);

				var node = document.createElement("th");
				myNode.appendChild(node);

				myNode.innerHTML = myNode.innerHTML + result;

				var thisNode = document.createElement("tr");
				thisNode.appendChild(document.createElement("td"));
				thisNode.appendChild(document.createElement("td"));

				var a = document.createElement('a');
				var linkText = document.createTextNode("Checkout");
				a.appendChild(linkText);
				a.title = "Checkout";
				a.href = "controller/checkout.php";
				a.className = "btn btn-default";
				thisNode.appendChild(a);

				myNode.appendChild(thisNode);

	        }
	    });
	}
};