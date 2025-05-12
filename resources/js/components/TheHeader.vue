<script setup>
import { inject } from 'vue';

// Get the shared reset functions object
const resetFunctions = inject('resetFunctions');

const resetStory = () => {
  // Call the reset function directly
  if (resetFunctions.resetTerminal) {
    resetFunctions.resetTerminal();
    console.log('Reset event executed');
  } else {
    console.warn('Reset function not available');
  }
};
</script>

<template>
  <header class="win98-header">
    <div class="title-bar">
      <div class="title-bar-icon">
        <div class="matrix-icon"></div>
      </div>
      <div class="title-bar-text">DOMOVOI.EXE</div>
      <div class="title-bar-controls">
        <button aria-label="Minimize"></button>
        <button aria-label="Maximize"></button>
        <button aria-label="Close" class="close-btn"></button>
      </div>
    </div>
    
    <div class="menu-bar">
      <div class="menu-option">File</div>
      <div class="menu-option">Edit</div>
      <div class="menu-option">Options</div>
      <div class="menu-option">Help</div>
      <div class="menu-spacer"></div>
      <button class="win98-button" @click="resetStory">Reset Terminal</button>
    </div>
  </header>
</template>

<style scoped>
.win98-header {
  font-family: 'MS Sans Serif', 'Segoe UI', Tahoma, sans-serif;
  border: 2px solid #0C0C0C;
  box-shadow: inset 1px 1px 0px #00FF00, inset -1px -1px 0px #003300;
  background-color: #000000;
  color: #00FF00;
  user-select: none;
}

.title-bar {
  height: 28px;
  background: linear-gradient(to right, #000000, #001100);
  padding: 2px;
  display: flex;
  align-items: center;
}

.title-bar-text {
  margin-left: 4px;
  font-weight: bold;
  color: #00FF00;
  text-shadow: 0 0 5px #00FF00;
  font-family: 'Courier New', monospace;
  letter-spacing: 1px;
}

.title-bar-icon {
  width: 16px;
  height: 16px;
  margin-left: 2px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.matrix-icon {
  width: 16px;
  height: 16px;
  background-image: radial-gradient(#00FF00, transparent);
  position: relative;
}

.matrix-icon::before {
  content: "M";
  font-size: 12px;
  font-weight: bold;
  color: #000;
  position: absolute;
  left: 3.5px;
  top: -1px;
}

.title-bar-controls {
  margin-left: auto;
  display: flex;
}

.title-bar-controls button {
  width: 16px;
  height: 14px;
  margin: 2px;
  border: 1px solid #00FF00;
  background-color: #000000;
  position: relative;
  padding: 0;
}

.title-bar-controls button:active {
  border: 1px inset #00FF00;
}

.title-bar-controls button:before,
.title-bar-controls button:after {
  content: '';
  position: absolute;
  background: #00FF00;
}

.title-bar-controls button[aria-label="Minimize"]:before {
  width: 8px;
  height: 2px;
  left: 3px;
  top: 6px;
}

.title-bar-controls button[aria-label="Maximize"]:before {
  width: 8px;
  height: 7px;
  left: 3px;
  top: 2px;
  border: 1px solid #00FF00;
  background: transparent;
}

.title-bar-controls button[aria-label="Close"]:before {
  width: 2px;
  height: 8px;
  left: 6px;
  top: 2px;
  transform: rotate(45deg);
}

.title-bar-controls button[aria-label="Close"]:after {
  width: 2px;
  height: 8px;
  left: 6px;
  top: 2px;
  transform: rotate(-45deg);
}

.menu-bar {
  height: 22px;
  background-color: #000000;
  display: flex;
  align-items: center;
  border-top: 1px solid #003300;
  border-bottom: 1px solid #003300;
  padding: 0 2px;
}

.menu-option {
  padding: 2px 8px;
  font-size: 12px;
  cursor: pointer;
}

.menu-option:hover {
  background-color: #001800;
}

.menu-spacer {
  flex-grow: 1;
}

.win98-button {
  font-family: 'MS Sans Serif', 'Segoe UI', Tahoma, sans-serif;
  font-size: 11px;
  height: 20px;
  background-color: #000000;
  color: #00FF00;
  border: 2px outset #00FF00;
  padding: 0 8px;
  cursor: pointer;
}

.win98-button:active {
  border-style: inset;
}

.win98-button:focus {
  outline: 1px dotted #00FF00;
}
</style>