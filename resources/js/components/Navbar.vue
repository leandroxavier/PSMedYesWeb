<template>
<div >


<nav class="navbar navbar-expand-sm navbar-dark bg-info mb-2">
    <div class="container" >

    <button v-b-toggle.sidebar-no-header type="button" class="btn btn-ligth btn-lg"  >
   <span class="glyphicon glyphicon-align-justify"  color="white">Menu</span>
   </button>
   <a href="#" class="navbar-brand">Funcionarios</a>
   </div>
   </nav>
    <div class="bg-secondary">
    <b-sidebar id="sidebar-no-header" aria-labelledby="sidebar-no-header-title" no-header shadow  class="bg-secondary">
      <template v-slot:default="{ hide}">
        <div class="p-3 bg-secondary" >
          <h4 id="sidebar-no-header-title">Menu</h4>
          <nav class="mb-5 bg-secondary" >
            <b-nav vertical>
            <b-button variant="dark" block @click="hide">Dashboard</b-button>
              <b-button variant="dark" block @click="hide">Shortcuts</b-button>
              <b-button variant="dark" block @click="hide">Overview</b-button>
              <b-button variant="dark" block @click="hide">Events</b-button>
              <b-button variant="dark" block @click="hide">About</b-button>
              <b-button variant="dark" block @click="hide">Services</b-button>
              <b-button variant="dark" block @click="hide">Contact</b-button>
                <b-button variant="primary" class=" mb-2" block @click="hide">Close Sidebar</b-button>
            </b-nav>
          </nav>
          
        </div>
      </template>
    </b-sidebar>
    </div>
  
    
    </div>

</div>


</template>
<script>
  export default {
    data () {
      return {
        items: [
          { title: 'Dashboard', icon: 'dashboard' },
          { title: 'Account', icon: 'account_box' },
          { title: 'Admin', icon: 'gavel' },
        ],
      }
    },
  }
</script>