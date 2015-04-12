/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


	function initPicker() {
         // alert ("inside picker") 
			var picker = new FilePicker({
                                
				apiKey: 'AIzaSyD2MXMpx_c6H38-wk3z097UbVPgg-FakaU',
				clientId: '32802320039-coq0vn95n2btdltq1c15rgj0kj6l45cd',
				buttonEl: document.getElementById('pick'),
                                
				onSelect: function(file) {
					console.log(file);
					alert('Selected ' + file.id);
                }                 
			});
                        
           }
                
                
/