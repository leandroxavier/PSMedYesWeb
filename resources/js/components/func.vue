<template>
<div class="container">
    
  

    <div>
        <h2>Funcionarios</h2>
         <div>
        <b-table class="table-dark" striped hover :items="employees" :fields="fields">
        <td>
            <button type="button" class="btn btn-primary btn-sm">Small button</button>
          </td></b-table>
        </div>
     
        <!--<div class="card card-body" v-for="employee in employees">
            <h3>{{employee.name}}</h3>
            <p>{{employee.sobrenome}}</p>
        </div>-->
        <div class=" mt-5 mb-5" visibility:hidden>
        <form class="form-inline" action="AddEmployee">
        <b-form-input v-model="nomeA" placeholder="Nome" class="mr-1"></b-form-input>
        <b-form-input v-model="sobrenomeA" placeholder="Sobrenome"class="mr-1" ></b-form-input>
        <b-form-input v-model="salarioA" placeholder="Salario"class="mr-1"></b-form-input>
        <b-form-input v-model="areaA" placeholder="Área"class="mr-1"></b-form-input>
        <b-button variant="success" @click="AddEmployee">Adicionar</b-button>
        </form>
        </div>
    </div>
</div>


</template>

<script>
import axios from 'axios'
import Vuetify from 'vuetify'
 export default{
     data(){
         return {
             nomeA:'',
             sobrenomeA:'',
            areaA:'',
            salarioA:'',
             
             employees:[],
             employee:{
                 id: '',
                 nome: '',
                 sobrenome: '',
                 area:'',
                 salario:''    
             },
             employee_id:'',
             pagination: {},
             edit:false,
             
         }
     },
     created(){
         this.fetchFuncionarios();
     },
     methods:{
         fetchFuncionarios()
         {  var vm = this;
            axios.get('http://127.0.0.1:8000/api/employees')
            .then(function(res){
                console.log(res);
                console.log(res.data.results);
                vm.employees = res.data;
            })
            .catch(function(err){
                console.log(err);
            })
        },
        AddEmployee(){
            axios.post(`http://127.0.0.1:8000/api/employees`, {
            name: this.nomeA, sobrenome: this.sobrenomeA,
            salario: this.salarioA,area:this.areaA
            })
            .then(response => {})
            .catch(e => {
            this.errors.push(e)
            })
        }
     }
 }


</script>