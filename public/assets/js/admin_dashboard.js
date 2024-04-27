// SIDEBAR TOGGLE

let sidebarOpen = false;
const sidebar = document.getElementById("sidebar");

function openSidebar() {
  if (!sidebarOpen) {
    sidebar.classList.add("sidebar-responsive");
    sidebarOpen = true;
  }
}

function closeSidebar() {
  if (sidebarOpen) {
    sidebar.classList.remove("sidebar-responsive");
    sidebarOpen = false;
  }
}

// ---------- CHARTS ----------

// Extract product names and quantities from topSellingProducts
const productNames = topSellingProducts.map(product => product.user_name);
const productQuantities = topSellingProducts.map(product => product.total_quantity);

// BAR CHART
const barChartOptions = {
  series: [
    {
      data: productQuantities,
      name: "Products",
    },
  ],
  chart: {
    type: "bar",
    background: "transparent",
    height: 350,
    toolbar: {
      show: false,
    },
  },
  colors: ["#2962ff", "#d50000", "#2e7d32", "#ff6d00", "#583cb3"],
  plotOptions: {
    bar: {
      distributed: true,
      borderRadius: 4,
      horizontal: false,
      columnWidth: "40%",
    },
  },
  dataLabels: {
    enabled: false,
  },
  fill: {
    opacity: 1,
  },
  grid: {
    borderColor: "#55596e",
    yaxis: {
      lines: {
        show: true,
      },
    },
    xaxis: {
      lines: {
        show: true,
      },
    },
  },
  legend: {
    labels: {
      colors: "#000000",
    },
    show: true,
    position: "top",
  },
  stroke: {
    colors: ["transparent"],
    show: true,
    width: 2,
  },
  tooltip: {
    shared: true,
    intersect: false,
    theme: "dark",
  },
  xaxis: {
    categories: productNames,
    title: {
      style: {
        color: "#000000",
      },
    },
    axisBorder: {
      show: true,
      color: "#55596e",
    },
    axisTicks: {
      show: true,
      color: "#55596e",
    },
    labels: {
      style: {
        colors: "#000000",
      },
    },
  },
  yaxis: {
    title: {
      text: "Count",
      style: {
        color: "#000000",
      },
    },
    axisBorder: {
      color: "#55596e",
      show: true,
    },
    axisTicks: {
      color: "#55596e",
      show: true,
    },
    labels: {
      style: {
        colors: "#000000",
      },
    },
  },
};

const barChart = new ApexCharts(
  document.querySelector("#bar-chart"),
  barChartOptions
);
barChart.render();

// AREA CHART
var outletNames = totalOrders.map(function (order) {
  return order.pickup_location;
});

var orderCounts = totalOrders.map(function (order) {
  return order.order_count;
});

const areaChartOptions = {
  series: [
    {
      name: "Number of Orders",
      data: orderCounts,
    },
  ],
  tooltip: {
    style: {
      colors: ["#000000"],
    },
    theme: "dark",
  },
  chart: {
    type: "area",
    background: "transparent",
    height: 350,
    stacked: false,
    toolbar: {
      show: false,
    },
  },
  colors: ["#00ab57"],
  labels: outletNames,
  xaxis: {
    labels: {
      style: {
        colors: "#000000",
      },
    },
    title: {
      text: "Outlets",
      style: {
        color: "#000000",
      },
    },
  },
  yaxis: {
    labels: {
      style: {
        colors: "#000000",
      },
    },
    title: {
      text: "Number of Orders",
      style: {
        color: "#000000",
      },
    },
  },
};

const areaChart = new ApexCharts(
  document.querySelector("#area-chart"),
  areaChartOptions
);
areaChart.render();