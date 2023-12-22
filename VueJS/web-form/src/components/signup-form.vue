<template>

  <form @submit.prevent="handleSubmit">
    <label >Email:</label>
    <input type="email" required v-model="email">

    <label >Pasword:</label>
    <input type="password" required v-model="pwd">
<div v-if="passwordError" class="error"> {{ passwordError }}</div>
  
<label> Role :</label>
    <select v-model="role">
        <option value="developer">developer</option>
        <option value="designer">designer</option>
    </select>

    <label> Skills: </label>
    <input type="text" v-model="tempSkills" @keyup="addSkills">
    <div v-for="skill in skills" :key="skill" class="pill">
<span @click="deleteSkills(skill)"> {{ skill }} </span>
    </div>
    
    <div class="terms">
        <input type="checkbox" v-model="terms" required>
        <label> veuillez accepter les conditions d'utilisation </label>
    </div>
   
    <div class="submit">
        <button>Create an account</button>
    </div>
    
  </form>

  <p>Email: {{email}} </p>
  <p>Password: {{pwd}} </p>
  <p>Role: {{role}}</p>
  <p>Terms: {{terms}}</p>
  <p>Skills: {{skills}}</p>


 
</template>

<script>
export default {
    data(){
        return  {
                email : "",
                pwd : "",
                role: "designer",
                terms: false,
                tempSkills:"",
                skills : [],
                passwordError: '',

                
             }
    },
    methods : {
        addSkills(e){
            if (e.key === 'Enter' && this.tempSkills){
                if(!this.skills.includes(this.tempSkills)){
                    this.skills.push(this.tempSkills)
                }
                this.tempSkills = ""
            }
         
        },
        deleteSkills(skill){
this.skills = this.skills.filter((item) => {
    return skill !== item
})
        },
        handleSubmit(){
            // validate password
            this.passwordError = this.pwd.length > 5 ?
             'cest okay' : 'the password must be at least 6 chars long'
        },
    }
}

</script>

<style>
form {
    max-width: 420px;
    margin: 30px auto;
    background: white;
    text-align: left;
    padding:40px;
    border-radius:10px;
}

label {
    color: #aaa;
    display:inline-block;
    margin: 25px 0 15 px;
    font-size: 0.6em;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: bold;
}
input , select{
    display:block;
    padding:10px 6px;
    width: 100%;
    box-sizing: border-box;
    border:none;
    border-bottom: 1px solid #ddd;
    color: #555;
}

input[type="checkbox"] {
    display: inline-block;
    width:16px;
    margin: 0 10px 0 0;
    position:relative;
    top: 2px;

}

.pill {
    display:inline-block;
    padding: 6px 12px;
    margin: 20px 10px 00;
    background: #eee;
    border-radius: 20px;
    font-size:12px;
    letter-spacing: 1px;
    font-weight: bold;
    color: #777;
    cursor: pointer;
}
button {
    background: #0b6dff;
    border : 0;
    padding: 10px 20px;
    margin-top: 20px;
    color:white;
    border-radius: 20px;
}
.submit {
    text-align: center;
}

.error {
    color: red ;
}
</style>