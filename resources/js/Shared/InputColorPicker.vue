<template>
    <span>

        <span class="ms-predefind-color" v-if="!this.value" @click="passClick">
          <span class="ms-predefind-color-in">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M-2 17H4.5V23.5H-2V17Z" fill="#DADAE2"></path><path d="M-2 4H4.5V10.5H-2V4Z" fill="#DADAE2"></path><path d="M-2 23.5H4.5V30H-2V23.5Z" fill="white"></path><path d="M-2 -2.5H4.5V4H-2V-2.5Z" fill="white"></path><path d="M-2 10.5H4.5V17H-2V10.5Z" fill="white"></path><path d="M4.5 17H11V23.5H4.5V17Z" fill="white"></path><path d="M4.5 4H11V10.5H4.5V4Z" fill="white"></path><path d="M4.5 23.5H11V30H4.5V23.5Z" fill="#DADAE2"></path><path d="M4.5 -2.5H11V4H4.5V-2.5Z" fill="#DADAE2"></path><path d="M4.5 10.5H11V17H4.5V10.5Z" fill="#DADAE2"></path><path d="M11 17H17.5V23.5H11V17Z" fill="#DADAE2"></path><path d="M11 4H17.5V10.5H11V4Z" fill="#DADAE2"></path><path d="M11 23.5H17.5V30H11V23.5Z" fill="white"></path><path d="M11 -2.5H17.5V4H11V-2.5Z" fill="white"></path><path d="M11 10.5H17.5V17H11V10.5Z" fill="white"></path><path d="M17.5 17H24V23.5H17.5V17Z" fill="white"></path><path d="M17.5 4H24V10.5H17.5V4Z" fill="white"></path><path d="M17.5 23.5H24V30H17.5V23.5Z" fill="#DADAE2"></path><path d="M17.5 -2.5H24V4H17.5V-2.5Z" fill="#DADAE2"></path><path d="M17.5 10.5H24V17H17.5V10.5Z" fill="#DADAE2"></path><path d="M24 17H30.5V23.5H24V17Z" fill="#DADAE2"></path><path d="M24 4H30.5V10.5H24V4Z" fill="#DADAE2"></path><path d="M24 23.5H30.5V30H24V23.5Z" fill="white"></path><path d="M24 -2.5H30.5V4H24V-2.5Z" fill="white"></path><path d="M24 10.5H30.5V17H24V10.5Z" fill="white"></path></svg>
          </span>
        </span>

        <input
            ref="icp__input"
            class="icp__input"
            :style="styleObject"
                type="color"
                :value="this.value"
                @input="_icp_handleInput"
            />
    </span>
</template>
<script>
export default {
  name: 'input-color-picker',
  props: [
    'value'
  ],
  computed:{
      styleObject() {
          return  {
            backgroundColor: this.value,
            width: !!(this.value) ? '28px' : 0,
            height: !!(this.value) ? '28px' : 0,
          }
      }
    },
  methods: {
    _icp_handleInput (e) {
      console.log(e.target.value)
      this.$emit('input', e.target.value)
    },
    passClick() {
        this.$refs.icp__input.click();
    }
  }
}
</script>
<style lang="css" scoped>

    .icp__input {
        height: 30px;
        border-radius: 50%;
        width: 30px;
        border: none;
        outline: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        cursor: pointer;
        padding: 0;
    }

    .icp__input::-webkit-color-swatch-wrapper {
        padding: 0;
    }

    .icp__input::-webkit-color-swatch {
        border: none;
        border-radius: 15px;
    }

    .icp__input::-moz-color-swatch {
        border: none;
        border-radius: 15px;
    }
</style>
