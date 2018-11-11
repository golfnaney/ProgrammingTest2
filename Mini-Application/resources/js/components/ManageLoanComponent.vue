<template>
    <div class="container">
        <div class="form-group headder-page">
            <h3>All Loans</h3>
        </div>
        <router-link :to="{name: 'add'}" class="btn btn-primary">Add New Loan</router-link>

        <div class="row justify-content-center mt-3">
            <div class="col-12">
                      <table id="tableLoan" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Loan Amount</th>
                              <th>Loan Term</th>
                              <th>Interest Rate</th>
                              <th>Created at</th>
                              <th>Edit</th>
                          </tr>
                      </thead>
                      <tbody>
                          
                                            </tbody>
                      <tfoot>
                          <tr>
                              <td>Average</td>
                              <td id="avgAmount"></td>
                              <td id="avgTerm"></td>
                              <td id="avgInterestRate"></td>
                              <td></td>
                              <td></td>
                          </tr>
                      </tfoot>
                  </table>
            </div>
        </div>
<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    </div>
</template> 
<script>
export default {
  data: function() {
    return {
      list: []
    };
  },
  methods: {
    fnDelete: function(id) {
      console.log(id);
    }
  },
  mounted() {
    // let self = this;
    // axios
    //   .get("/getList")
    //   .then(function(response) {
    //     self.list = response.data;
    //   })
    //   .catch(function(error) {
    //     console.log(error);
    //   });
    console.log("Component mounted.");
  }
};
</script>

<style>
.headder-page {
  margin-top: 20px;
}
</style>

