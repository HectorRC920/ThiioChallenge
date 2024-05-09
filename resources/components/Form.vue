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
      },
    })
    const name = useField('name')
    const email = useField('email')


    const submit = handleSubmit(values => {
      alert(JSON.stringify(values, null, 2))
    })
  </script>
  <style>
    .form-container{
     display: flex;
     justify-content: center;
    }
    #form{
      width: 30%;
    }
  </style>
