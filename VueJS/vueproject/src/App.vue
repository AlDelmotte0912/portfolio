<template>
  <h1>{{ title }}</h1>
  <teleport to=".modals" v-if="showModal">
    <Modal theme="sale" @close="toggleModal">
      <h1>Ninja giveaway</h1>
      <p>grab your ninja swag for half the price!</p>

      <template v-slot:links>
        <a href="#">sign up now !</a>
        <a href="#">more info</a>
      </template>
    </Modal>
  </teleport>
  <button @click="toggleModal">open modal</button>

  <teleport to=".modals" v-if="showModal2">
    <Modal2 @close="toggleModal2">
      <h1>ca c'est mon modal</h1>
      <p>et il claque beaucoup plus que l'autre</p>
      <p><small>c'est faux, snif snif</small></p>
      <template v-slot:thanks>
        <button id="thanks" @click="sayThanks">se faire remercier</button>
      </template>
    </Modal2>
  </teleport>
  <button @click="toggleModal2">show modal 2</button>
</template>

<script>
import Modal from "./components/My-modal.vue";
import Modal2 from "./components/My-modal.vue";

export default {
  name: "App",
  components: { Modal, Modal2 },
  data() {
    return {
      title: "My First Vue App", 
      showModal: false,
      showModal2: false,
    };
  },
  methods: {
    toggleModal() {
      this.showModal = !this.showModal;
    },
    toggleModal2() {
      this.showModal2 = !this.showModal2;
    },
    sayThanks() {
      document.getElementById("thanks").innerHTML = "merci le sang";
    },
  },
};
</script>

<style>
#app , .modals {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
