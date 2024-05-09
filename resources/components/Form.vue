<template>
    <div class="form-container">
        <form @submit.prevent="submit" id="form">
          <v-text-field
            v-model="name.value.value"
            :counter="10"
            :error-messages="name.errorMessage.value"
            label="Name"
          ></v-text-field>

          <v-text-field
            v-model="email.value.value"
            :error-messages="email.errorMessage.value"
            label="E-mail"
          ></v-text-field>
          <v-text-field
            v-model="password.value.value"
            :error-messages="password.errorMessage.value"
            label="Password"
            type="password"
          ></v-text-field>
          <v-btn
            class="me-4"
            type="submit"
          >
            submit
          </v-btn>
          <v-btn @click="handleReset">
            clear
          </v-btn>
        </form>
    </div>
  </template>
  <script setup>
    import { useField, useForm } from 'vee-validate'
    import axios from 'axios';

    const { handleSubmit, handleReset } = useForm({
      validationSchema: {
        name (value) {
          if (value?.length >= 2) return true

          return 'Name needs to be at least 2 characters.'
        },
        email (value) {
          if (/^[a-z.-]+@[a-z.-]+\.[a-z]+$/i.test(value)) return true

          return 'Must be a valid e-mail.'
        },
        password (value){
          if(/^(?=.*[0-9])(?=.*[!@#$%^&*(),.?":{}|<>])[a-zA-Z0-9!@#\-$%^&*(),.?":{}|<>]{8,}$/i.test(value)) return true
          return 'Must have at least 8 characters, one special character and number.'
        }
      },
    })
    const name = useField('name')
    const email = useField('email')
    const password = useField('password')


    const submit = handleSubmit(async values => {
    try {
      const response = await axios.post('/login', values, {
        headers: {
          'Content-Type': 'application/json'
        }
      });

      // Handle success response
      console.log(response.data); // Log response data

      // Optionally, you can perform additional actions here
    } catch (error) {
      // Handle errors here
      console.error('There was a problem with the Axios request:', error);
    }
    });
  </script>
  <style>
    .form-container{
     display: flex;
     justify-content: center;
     align-items: center;
    }
    #form{
      width: 30%;
    }
  </style>
