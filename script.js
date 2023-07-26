// Function to update the table content with the fetched data
function updateTable(data) {
    const tbody = $("#tableBody");
    tbody.empty(); // Clear the existing rows

    // Loop through the data and create new rows
    data.forEach((row) => {
      const newRow = `
        <tr>
          <td>${row.id}</td>
          <td>${row.item}</td>
          <td>${row.weight} kg</td>
          <td>${row.wasteType}</td>
          <td>${row.xdate}</td>
          <td>${row.contact || ''}</td>
          <td><button class="deleteBtn" data-id="${row.id}" onClick="deleteData(${row.id});" style="background-color: red;">Delete</button></td>
        </tr>
      `;
      tbody.append(newRow);
    });
  }

  // Function to fetch data from the server and update the table
  function fetchData() {
    $.ajax({
      url: "display.php", // Replace "fetch_data.php" with the actual PHP file name
      dataType: "json",
      success: function (data) {
        updateTable(data);
      },
      error: function (error) {
        console.error("Error fetching data:", error);
      },
    });
  }

  // Call the fetchData function initially to display data on page load
fetchData();

  // Set an interval to fetch and update data every few seconds (e.g., every 5 seconds)
setInterval(fetchData, 5000); // Adjust the interval as per your preference

// Function to handle adding new data
function addDataToTable() {
  const formData = {
    item: $("#item").val(),
    weight: $("#weight").val(),
    wasteType: $("#wasteType").val(),
    xdate: $("#xdate").val(),
  };

  // Send the form data to the server using AJAX
  $.ajax({
    type: "POST",
    url: "add.php",
    data: formData,
    dataType: "json",
    success: function (response) {
      if (response.status === "success") {
        alert("Data inserted successfully.");
      } else {
        alert("Error inserting data: " + response.message);
      }
    },
    error: function (error) {
      console.error("Error inserting data:", error);
    },
  });
}

// Event listener for form submission
$("#addEntryForm").submit(function (event) {
  event.preventDefault(); // Prevent the default form submission behavior
  addDataToTable(); // Call the function to add data to the table
});

// Function to handle deletion
function deleteData(id) {
  // Send the delete request to the server using AJAX
  $.ajax({
    type: "GET",
    url: "delete.php",
    data: {
      delete: true,
      id: id,
    },
    dataType: "json",
    success: function (response) {
      console.log("Server response:", response); // Add this line for debugging

      if (response.status === "success") {
        // Data deleted successfully, fetch updated data and update the table
        alert("Data deleted successfully.");
        fetchData();
      } else {
        // Error deleting data, show error alert
        alert("Error deleting data: " + response.message);
      }
    },
    error: function (error) {
      console.error("Error deleting data:", error);
    },
  });
}

$(document).ready(function () {
  // Event listener for form submission
  $("#search-form").submit(function (event) {
    event.preventDefault(); // Prevent the default form submission behavior
    const searchTerm = $("#search-form input[type='text']").val();
    searchData(searchTerm);
  });

  // Call the fetchData function initially to display data on page load
  fetchData();

  // Set an interval to fetch and update data every few seconds (e.g., every 5 seconds)
  setInterval(fetchData, 5000); // Adjust the interval as per your preference
});

// Function to handle search
function searchData(searchTerm) {
  // Send the search request to the server using AJAX
  $.ajax({
    type: "GET",
    url: "search.php",
    data: {
      search: searchTerm,
    },
    dataType: "json",
    success: function (data) {
      // Update the table with the search results
      updateTable(data);
    },
    error: function (error) {
      console.error("Error searching data:", error);
    },
  });
}
