
const BASE_URL = "http://localhost/Fse-solitaire/back-end/apis/";

document.addEventListener("DOMContentLoaded", () => {
    const tbody = document.querySelector(".tb tbody");
    const submitBtn = document.querySelector(".submitBtn");
async function getScores() {
    try {
        const response = await axios.get(BASE_URL + "get_scores.php");
        if (response.data.success) {
            displayScores(response.data.data);
        } else {
            console.error("Error fetching scores:", response.data.error);
        }
    } catch (error) {
        console.error("Error fetching scores:", error);
    }
}


function displayScores(scores) {
   
    tbody.innerHTML = ""; 
    scores.forEach(score => {
        const tr = document.createElement("tr");
        const name = document.createElement("td");
        name.textContent = score.name;
        const playerscore = document.createElement("td");
        playerscore.textContent = score.score;
        const duration = document.createElement("td");
        duration.textContent = score.duration;

        tr.appendChild(name);
        tr.appendChild(playerscore);
        tr.appendChild(duration);
        tbody.appendChild(tr);
    });
}


async function addScores(value_name){
    try {
        const url = BASE_URL + "add_scores.php";
        const response = await axios.post(url, { name: value_name });

        if(response.data.success){
          alert("Player added successfully!");
            getScores(); 
             window.location.href = "solitaire.html";
        } else {
            console.log(response.data.error);
        }
    } catch (error) {
        console.log("Error adding score:", error);
    }
}
    
      if (submitBtn) {
        submitBtn.addEventListener("click", () => {
            const playerName = document.getElementById("playerName").value.trim();
            addScores(playerName);
        });
    } 
    getScores(); 
});

