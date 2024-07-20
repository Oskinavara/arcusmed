const fs = require('fs-extra');
const path = require('path');

const sourceDir = path.join(__dirname, 'rejestracja-online');
const destDir = path.join(__dirname, 'dist', 'rejestracja-online');

fs.copy(sourceDir, destDir, (err) => {
  if (err) {
    console.error('Error copying SmartDental files:', err);
  } else {
    console.log('SmartDental files copied successfully.');
  }
});
