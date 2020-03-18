function GreatBalancer(block) {
  let wrapWidth = $(block).parent().width();  // 1
  let blockWidth = $(block).width();          // 2
  let wrapDivide = Math.floor(wrapWidth / blockWidth);     // 3
  let cellArr = $(block);

  for (let arg = 1; arg <= arguments.length; arg++) {           // 4.1

    for (let i = 0; i <= cellArr.length; i = i + wrapDivide) {
      let maxHeight = 0;
      let heightArr = [];

      for (let j = 0; j < wrapDivide; j++) {               // 4.2
        heightArr.push($(cellArr[i + j]).find(arguments[arg]));

        if (heightArr[j].outerHeight() > maxHeight) {
         maxHeight = heightArr[j].outerHeight();
        }
      }

      for (var counter = 0; counter < heightArr.length; counter++) {           // 4.3
        $(cellArr[i + counter]).find(arguments[arg]).outerHeight(maxHeight);
      }

    }
  }

}