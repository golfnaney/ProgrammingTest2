<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Manage Loan</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>
<body>
    
    <div id="app">
        <router-view></router-view>
       
    </div>
    <script src="{{ asset('js/app.js') }}"></script> 
    <script src="{{ asset('js/datatables.min.js') }}"></script> 
    <script>
        $(document).ready(function() {
            setTable()
        });
        function setTable(){
          
            let objData = {}
            let self = this;
            let arrData = []
            let Average = []
            
            axios
            .get("/getList")
            .then(function(response) {
                objData = response.data;
                let arrAvg = [0,0,0]
                let len = objData.length 
                for(let i = 0;i<len;i++){
                    let tmpData = []
                    let btnManage = ""
                    let tmpID = objData[i].id
                    btnManage = `
                    <button type="button" class="btn btn-info" onclick="fnRedirect('detial',${tmpID})">View</button>
<button class="btn btn-success" type="button" onclick="fnRedirect('edit',${tmpID})">Edit</button>
<button class="btn btn-danger" type="button" onclick="fnRedirect('delete',${tmpID})">Delete</button>
`
                    let curId = objData[i].id  
                    tmpData.push(tmpID)
                    tmpData.push(setDigi(setDefault(objData[i].amount)) + " ฿")
                    tmpData.push(setDefault(objData[i].term) + " Years")
                    tmpData.push(setDigi(setDefault(objData[i].interest_rate))+ " %")
                    tmpData.push(objData[i].created_at)
                    tmpData.push(btnManage)

                    arrData.push(tmpData)
                    arrAvg[0] += setDefault(objData[i].amount)
                    arrAvg[1] += setDefault(objData[i].term)
                    arrAvg[2] += setDefault(parseFloat(objData[i].interest_rate)) 
                }
                table=$('#tableLoan').DataTable({
                  "destroy": true,
                 data:arrData
                })
                $('#avgAmount').text(setDigi(arrAvg[0]/len) + " ฿")
                $('#avgTerm').text(setDigi(arrAvg[1]/len) + " Years")
                $('#avgInterestRate').text(setDigi(arrAvg[2]/len)+ " %")
            })
            .catch(function(error) {
                console.log(error);
            }); 
        }
        function fnRedirect(page,id){
             let self = this;
                
                axios
                .get("/"+page+"/"+ id)
                .then(function(response) {
                    console.log(response)
                    setTable()
                })
                .catch(function(error) {
                    console.log(error);
                });
           
        }
        function addCommas(nStr){
            nStr += '';
            var x = nStr.split('.');
            var x1 = x[0];
            var x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
            }
        function setDigi(num){
             return addCommas(parseFloat(num).toFixed(2).toLocaleString());
        }
        function setDefault(value){
            try{
                if(value===undefined){
                    value = 0
                }else if(value===null||value===""){
                    value = 0
                } 
                return value
            }catch(err){
                return 0
            }
        }
    </script>
</body>
</html>