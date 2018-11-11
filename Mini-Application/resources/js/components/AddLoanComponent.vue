<template>
    <div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card card-default">
        <div class="card-header"><h4>Create Loan</h4></div>
        <div class="card-body">
           <!-- <formInput
             comFor="loanAmount"
             comId="txtLoanAmount"
             comText="Loan Amount"
             comSimbol="฿"
             :comBlind="modelLoanAmount"
           ></formInput>
           <formInput
             comFor="loanTerm"
             comId="txtLoanTerm"
             comText="Loan Term"
             comSimbol="Years"
             :comBlind="modelLoanAmount2"
           ></formInput>
           <formInput
             comFor="InterestRate"
             comId="txtInterestRate"
             comText="Interest Rate"
             comSimbol="%"
             :comBlind="modelLoanAmount3"
           ></formInput> 
        -->  
<form action="/" method="POST" @submit.prevent="addLoan()">
<div class="row form-group">
        <label   class= "col-4 control-label" > Loan Amount  : </label>
            <div class="col-8">
                <div class="input-group">
                    <input type="text" class="form-control"   v-model="loan.amount"  id="txtLoanAmount" placeholder="Enter" required>
                        <div class="input-group-prepend">
                            <span class="input-group-text">฿</span>
                        </div>
                    </div>
                 </div>
            </div>
            <div class="row form-group">
        <label   class= "col-4 control-label" > Loan Term  : </label>
            <div class="col-8">
                <div class="input-group">
                    <input type="text" class="form-control"   v-model="loan.term"  id="txtLoanTerm" placeholder="Enter" required>
                        <div class="input-group-prepend">
                            <span class="input-group-text">Years</span>
                        </div>
                    </div>
                 </div>
            </div>
            <div class="row form-group">
        <label   class= "col-4 control-label" > Interest Rate  : </label>
            <div class="col-8">
                <div class="input-group">
                    <input type="text" class="form-control"   v-model="loan.interest_rate"  id="txtInterestRate" placeholder="Enter" required>
                        <div class="input-group-prepend">
                            <span class="input-group-text">฿</span>
                        </div>
                    </div>
                 </div>
            </div>
          <div class="row form-group">
            <label for="startDate" class="col-4 control-label">
              Start Date :
            </label>
            <div class="col-4">
              <select v-model="loan.select_mounth" id="ddlMount" class="form-control">
                <option
                  v-for="(value, key) in mounth"
                  :value="key"
                  :key="key"
                  >{{ value }}</option
                >
              </select>
            </div>
            <div class="col-4">
              <input
                type="number"
                class="form-control"
                id="comId"
                placeholder="Enter"
                required
                v-model="loan.select_year"
              />
            </div>
          </div>
   
          <div class="row form-group justify-content-center mt-4">

            <button class="btn btn-primary mr-2" type="submit" >Create</button>
            <router-link :to="{name: 'manage'}" class="btn btn-secondary ml-2">Back</router-link>
          </div>
        </form></div> 
      </div>
    </div>
  </div>
 </div>
</template>

<script>
var csrf = "{{csrf_token()}}";
export default {
  data: function() {
    return {
      props: [],
      mounth: [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"
      ],
      loan: {
        amount: "",
        term: "",
        interest_rate: "",
        select_mounth: "",
        select_year: "",
        action_by: "",
        created_at: ""
      },
      list: []
    };
  },
  crated: function() {
    this.fetchLoanList();
  },
  methods: {
    addLoan() {
      let self = this;
      this.loan.created_at = setFormatDate();
      console.log(this.loan.created_at);
      axios
        .post("/addLoan", this.loan)
        .then(function(response) {
          //console.log(response.data);
          self.$router.push("/detail/" + response.data);
        })
        .catch(function(error) {
          console.log(error.message);
        });
    }
  },
  mounted() {
    let currMounth = new Date();
    this.loan.select_mounth = currMounth.getMonth();
    this.loan.select_year = currMounth.getFullYear();
    console.log(this.loan.amount);
  }
};
function setFormatDate() {
  let dateNow = new Date();
  let resultDate =
    (dateNow.getFullYear().length < 2
      ? "0" + dateNow.getFullYear()
      : dateNow.getFullYear()) +
    "-" +
    ((dateNow.getMonth() + 1).length < 2
      ? "0" + (dateNow.getMonth() + 1)
      : dateNow.getMonth() + 1) +
    "-" +
    (dateNow.getDate().length < 2
      ? "0" + dateNow.getDate()
      : dateNow.getDate()) +
    " " +
    (dateNow.getHours().length < 2
      ? "0" + dateNow.getHours()
      : dateNow.getHours()) +
    ":" +
    (dateNow.getMinutes().length < 2
      ? "0" + dateNow.getMinutes()
      : dateNow.getMinutes()) +
    ":" +
    (dateNow.getSeconds().length < 2
      ? "0" + dateNow.getSeconds()
      : dateNow.getSeconds());
  return resultDate;
}
</script>

<style>
.container {
  padding-top: 20px;
}
.control-label {
  margin-top: 5px;
  font-weight: bold;
  text-align: right;
}
</style>