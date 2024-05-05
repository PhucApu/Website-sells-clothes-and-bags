window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer", {
           exportEnabled: true,
           animationEnabled: true,
           title: {
                  text: "Theo danh mục sản phẩm: 295"
           },
           legend: {
                  cursor: "pointer",
                  itemclick: explodePie
           },
           data: [{
                  type: "pie",
                  showInLegend: true,
                  toolTipContent: "{name}: <strong>{y}</strong>",
                  indexLabel: "{name} - {y}",
                  dataPoints: [
                         { y: 30, name: "Áo thun", exploded: true },
                         { y: 50, name: "Áo sơ mi" },
                         { y: 20, name: "Áo khoác" },
                         { y: 5, name: "Áo Hoodie" },
                         { y: 11, name: "Áo Polo" }
                  ]
           }]
    });
    chart.render();
}
function explodePie(e) {
    if (typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
           e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
    } else {
           e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
    }
    e.chart.render();

}

const click = document.querySelectorAll(".list-button p");

function clearClickButton() {
    click.forEach((current, i) => {
           if (current.classList.contains("click-button")) {
                  current.classList.remove("click-button");
           }
    });
}
click.forEach((current, i) => {
    current.addEventListener("click", () => {
           clearClickButton();
           current.classList.add("click-button");
    });
});