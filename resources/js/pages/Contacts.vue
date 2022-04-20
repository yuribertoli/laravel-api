<template>
  <div class="container">
    <div class="row">
      <div class="col-12">

        <!-- utilizzo la funzione sendForm per inviare i dati, al posto del -->
        <form @submit.prevent="sendForm">

          <div v-if="success" class="alert alert-success">
            Email inviata correttamente
          </div>

          <div class="form-group">
            <label for="name">Come ti chiami?</label>
            <input class="form-control" :class="{'is-invalid': errors.name}" type="text" id="name" name="name" v-model="name">
            <p v-for="(error, index) in errors.name" :key="index" class="invalid-feedback">
              {{error}}
            </p>
          </div>

          <div class="form-group">
            <label for="email">Inserisci la tua mail</label>
            <input class="form-control" :class="{'is-invalid': errors.email}" type="email" id="email" name="email" v-model="email">
            <p v-for="(error, index) in errors.email" :key="index" class="invalid-feedback">
              {{error}}
            </p>
          </div>

          <div class="form-group">
            <label for="message">Inserisci la tua mail</label>
            <textarea class="form-control" :class="{'is-invalid': errors.message}" id="message" name="message" v-model="message"></textarea>
            <p v-for="(error, index) in errors.message" :key="index" class="invalid-feedback">
              {{error}}
            </p>
          </div>

          <button class="btn btn-primary" type="submit">{{sendingInProgress?'Invio in corso':'Invia'}}</button>
          
        </form>

      </div>
    </div>
  </div>
</template>

<script>
export default {
    name: "Contacts",

    methods: {
      sendForm(){

        this.sendingInProgress = true;

        axios.post('/api/contacts', {
          'name': this.name,
          'email': this.email,
          'message': this.message
        }).then(response => {

          this.sendingInProgress = false;

          if (response.data.errors) {
            this.errors = response.data.errors;
            this.success = false;
          } else {
            this.success = true;
            this.name = '';
            this.email = '';
            this.message = '';
            this.errors = {};
          }

          console.log(response);
        });
      }
    },

    data() {
        return {
          name: '',
          email: '',
          message: '',
          sendingInProgress: false,
          errors: {},
          success: false
        }
    }
}
</script>

<style>

</style>