document.addEventListener("DOMContentLoaded", function () {
    const healthData = window.healthAppData || {
        steps: [0, 0, 0, 0],
        calories: [0, 0, 0, 0, 0, 0, 0],
        exercise: [0, 0, 0, 0],
        stress: [0, 0, 0, 0]
    };

    const colors = {
        deep: "#2C5565",
        medium: "#4E9C94",
        soft: "#82BEAA",
        light: "#A6D7C8",
        dark: "#23424E"
    };

    const ctxSteps = document.getElementById("stepsChart");
    if (ctxSteps) {
        new Chart(ctxSteps, {
            type: "line",
            data: {
                labels: ["Minggu 1", "Minggu 2", "Minggu 3", "Minggu 4"],
                datasets: [{
                    label: "Langkah",
                    data: healthData.steps,
                    borderColor: colors.deep,
                    backgroundColor: colors.light,
                    borderWidth: 3,
                    tension: 0.3,
                    fill: true
                }]
            },
            options: { responsive: true, maintainAspectRatio: false }
        });
    }

    const ctxCalorie = document.getElementById("calorieChart");
    if (ctxCalorie) {
        new Chart(ctxCalorie, {
            type: "bar",
            data: {
                labels: ["Sen", "Sel", "Rab", "Kam", "Jum", "Sab", "Min"],
                datasets: [{
                    label: "Kalori (Kkal)",
                    data: healthData.calories,
                    backgroundColor: colors.medium,
                    borderRadius: 8
                }]
            },
            options: { responsive: true, maintainAspectRatio: false }
        });
    }

    const ctxExercise = document.getElementById("exerciseChart");
    if (ctxExercise) {
        new Chart(ctxExercise, {
            type: "line",
            data: {
                labels: ["Sep", "Okt", "Nov", "Des"],
                datasets: [{
                    label: "Menit",
                    data: healthData.exercise,
                    borderColor: colors.medium,
                    backgroundColor: colors.soft + "55",
                    fill: true,
                    tension: 0.4
                }]
            }
        });
    }

    const ctxStress = document.getElementById("stressChartPie");
    if (ctxStress) {
        new Chart(ctxStress, {
            type: "pie",
            data: {
                labels: ["Minggu 1", "Minggu 2", "Minggu 3", "Minggu 4"],
                datasets: [{
                    data: healthData.stress,
                    backgroundColor: [colors.deep, colors.medium, colors.soft, colors.light]
                }]
            }
        });
    }
});