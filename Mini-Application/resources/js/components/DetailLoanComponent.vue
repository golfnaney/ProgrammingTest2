<template>
    <div class="container">
        <div class="form-group headder-page mt-4">
            <h3>Loan Details </h3>
            <div class="row">
                <div class="col-md-3">ID:</div>
                <div class="col-md-3">{{ loanDetail[0].id }}</div>
            </div>
            <div class="row">
                <div class="col-md-3">Loan Amount:</div>
                <div class="col-md-3">{{ loanDetail[0].amount }} ฿</div>
            </div>
            <div class="row">
                <div class="col-md-3">Loan Term:</div>
                <div class="col-md-3">{{loanDetail[0].term }} Years</div>
            </div>
            <div class="row">
                <div class="col-md-3">Interest Rate:</div>
                <div class="col-md-3">{{ loanDetail[0].interest_rate }} %</div>
            </div>
            <div class="row">
                <div class="col-md-3">Created at:</div>
                <div class="col-md-3">{{ loanDetail[0].created_at }} </div>
            </div>
        </div>
        <router-link :to="{name: 'manage'}" class="btn btn-secondary">back</router-link>
        
        <div class="row justify-content-center mt-3">
            <div class="col-md-8">
               <table id="tableLoanDetail" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                          <tr>
                              <th>Payment No</th>
                              <th>Date</th>
                              <th>Payment Amount</th>
                              <th>Principal</th>
                              <th>Interest</th>
                              <th>Balance</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr  v-for="(value,index) in periods" :key="index">
                              <th>{{index}}</th>
                              <th>Date</th>
                              <th>Payment Amount</th>
                              <th>Principal</th>
                              <th>Interest</th>
                              <th>Balance</th>
                          </tr>
                                            </tbody>
                  </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  data: function() {
    return {
      loanDetail: [],
      periods
    };
  },
  mounted() {
    let periods = [];
    let curr = this;
    axios
      .get("/getDetail/" + this.$route.params.id)
      .then(function(response) {
        curr.loanDetail = response.data;
        console.log(curr.loanDetail[0].term);

        for (let i = 0; i < curr.loanDetail[0].term * 12; i++) {
          periods.push({ payment_no: i + 1 });
        }
        console.log(periods);
      })
      .catch(function(error) {
        console.log(error.message);
      });
    console.log("Component mounted.");
  }
};
</script>

<style>
.headder-page {
  margin-top: 20px;
}
</style>

