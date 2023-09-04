const fs = require('fs');
const uglify = require('uglify-js');
const CleanCSS = require('clean-css');

// Função para minificar arquivos JavaScript
const minifyJavaScript = (inputFile, outputFile) => {
  const code = fs.readFileSync(inputFile, 'utf8');
  const result = uglify.minify(code);

  fs.writeFileSync(outputFile, result.code, 'utf8');
};

// Função para minificar arquivos CSS
const minifyCSS = (inputFile, outputFile) => {
  const code = fs.readFileSync(inputFile, 'utf8');
  const result = new CleanCSS().minify(code);

  fs.writeFileSync(outputFile, result.styles, 'utf8');
};

// Minificar arquivos
minifyJavaScript('src/js/app.js', 'dist/js/app.min.js');
minifyCSS('src/css/styles.css', 'dist/css/styles.min.css');