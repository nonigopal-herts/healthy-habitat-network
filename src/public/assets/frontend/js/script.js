// Add event listeners to buttons
// document.getElementById('button1').addEventListener('click', function () {
//   alert('Button 1 was clicked!')
// })
//
// document.getElementById('button2').addEventListener('click', function () {
//   alert('Button 2 was clicked!')
// })
//
// document.getElementById('button3').addEventListener('click', function () {
//   alert('Button 3 was clicked!')
// })


// Toggle the form sections based on the user selection (Resident, Business, or Council)
const residentBtn = document.getElementById('residentBtn')
const businessBtn = document.getElementById('businessBtn')
const councilBtn = document.getElementById('councilBtn')

const residentFields = document.querySelectorAll('.resident-only')
const businessFields = document.querySelectorAll('.business-only')

function toggleForm(type) {
    // Remove active toggle from all buttons
    residentBtn.classList.remove('active-toggle')
    businessBtn.classList.remove('active-toggle')
    councilBtn.classList.remove('active-toggle')

    // Hide all special fields
    residentFields.forEach((el) => el.classList.add('d-none'))
    businessFields.forEach((el) => el.classList.add('d-none'))

    // Show the relevant fields based on selected type
    if (type === 'resident') {
        residentBtn.classList.add('active-toggle')
        residentFields.forEach((el) => el.classList.remove('d-none'))
    } else if (type === 'business') {
        businessBtn.classList.add('active-toggle')
        businessFields.forEach((el) => el.classList.remove('d-none'))
    } else if (type === 'council') {
        councilBtn.classList.add('active-toggle')
    }
}

// Event listeners for buttons to toggle form fields
residentBtn.onclick = () => toggleForm('resident')
businessBtn.onclick = () => toggleForm('business')
councilBtn.onclick = () => toggleForm('council')
