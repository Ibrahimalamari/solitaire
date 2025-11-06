let tableBody = document.querySelector(".tb tbody"); // target tbody

axios.get("../back-end/getscores.php")
  .then(response => {
    const scores = response.data;

    tableBody.innerHTML = ""; // clear old rows

    scores.forEach(score => {
      let tr = document.createElement("tr");

      let tdUsername = document.createElement("td");
      tdUsername.textContent = score.name;
      tr.appendChild(tdUsername);

      let tdScore = document.createElement("td");
      tdScore.textContent = score.score;
      tr.appendChild(tdScore);

      let tdDuration = document.createElement("td");
      tdDuration.textContent = score.duration;
      tr.appendChild(tdDuration);

      tableBody.appendChild(tr); // append to tbody, not table
    });
  })
  .catch(error => console.error("Error fetching scores:", error));
