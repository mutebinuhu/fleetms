<style type="text/css">
	body {
  background: rgb(204,204,204); 
  font-size: 12px;
}
.out-put{
  font-weight: bold;
  text-decoration: underline;
  font-size: 13px;
}
page{
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0cm;
  box-shadow: 0 0 0cm rgba(0,0,0,0.5);
  padding: 5px;

}
page[size="A4"] {  
  width: 18.5cm;
  height: 26.5cm; 
}
.row{
  display: flex;
  padding: 5px;
  justify-content: space-around;

}
.coat-img{

    display: flex;

               
}
.coat-of-arm{
  display: flex;
}
.my-info{
  display: flex;
  justify-content: space-around;
    text-transform: uppercase;


}
.col-4{
  flex-basis: 33%;


}
.table{
  display: flex;
  justify-content: space-between;
  border: 1px  solid gray;

}
.section{
  padding: 5px;
  height: 150px;
  border-left: 1px solid gray
}

.table .section{
  flex-basis: 30%;
}
.table .section h3{
  border-bottom: 2px  solid gray;
  text-align: center;

}
</style>
<!DOCTYPE html>
<html>
<head>
  <!--<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">-->
	<title>
		car verification form
	</title>
</head>
<body>
		<page size="A4">
      <div class="row">
        <div class="col-4">
           <p>MINISTRY OF INTERNAL AFFAIRS <br>JINJA RD</p>
           <p>P.O.BOX 7191,  KAMPALA-UGANDA</p>
  
        </div>
        <div class="col-4 coat">
              <div class="coat-of-arm">
                <img src="https://d1yjjnpx0p53s8.cloudfront.net/styles/logo-thumbnail/s3/112012/uganda_court_of_arms.png?itok=cmhoQ3Mh" width="100px" height="80px" class="coat-img" style="margin: auto;" onclick="printMe();">
              </div>
          
        </div>
        <div class="col-4">
          <p>MINISTRY OF INTERNAL AFFAIRS <br>JINJA RD</p>
          <p>P.O.BOX 7191,  KAMPALA-UGANDA</p>
          
        </div>
      </div>
      <hr>
      <div class="container">
        <h3>VEHICLE DEFECT VERIFICATION FORM PRIOR TO REPAIR</h3>
        <h3>JOB No:{{$download->id}}</h3>
        <p>To:<b>The Cheif Mechanical Engineer-Ministry of Works and Transport</b></p>
        <p>Our ministry Vehicle of particulars hereunder developed defecets as described in item 2. This is to requestyou have the vehicle inspected and furnish us with your findings </p>
      </div>
      <div class="data">
        <h3>1.0 <b>VEHICLE DATA</b></h3>
        <p>Registration Number : <span class="out-put">{{  $download->reg_no}}</span><br><br><span>Make:  <span class="out-put">{{ $download->make}}</span></span><br><br><span>Type: <span class=out-put>{{$download->type}}</span></span><br><br><span>Engine Number:<span class="out-put">{{ $download->eng_no}}</span></span><br><br><span>Chasis No: <span class="out-put">{{$download->chasis_no}}</span></span><br><br><span>Year Of Manufacture: <span class="out-put">{{$download->date}}</span></span><br><br><span>Mileage:<span class="out-put">{{$download->mileage}}.</span></span></p>

        <h3>2.0 <b>General Description</b></h3>
          <p>{{$download->description}}</p>

        <div class="my-info">
          <h3>Name : {{ Auth::User()->name}}</h3>
          <h3>Sign..................................................</h3>
          <h3>Date....................................................</h3>
        </div>

        <div class="findings">
          <h3>3.0 <b>Technical findings:</b></h3>
          <div class="table">
            <div class="section">
              <h3>NO</h3>
           
            </div>
             <div class="section">
              <h3>FINDINGS</h3>
                   
            </div>
             <div class="section">
              <h3>PRESCRIBED REPAIR</h3>
                   
            </div>

          </div>
        </div>
      </div>
      <div class="">
        <h3>1.0 Remarks</h3>
        <p>......................................................................................................................................................................................................................................</p>
        <p>......................................................................................................................................................................................................................................</p>
         <h3>INSPECTION ENGINEER...........................................................................</b> Sign...........................................................</h3>
          <h3>CHIEF MECHANICAL ENGINEER......................................................</b> Sign................................................................</h3>
      </div>
    </page>
<script type="text/javascript">
  function printMe()
  {
    window.print();
  }
</script>
</body>
</html>