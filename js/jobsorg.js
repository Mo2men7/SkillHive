let OpenedJobs=document.getElementsByClassName("Opened")
let ClosedJobs=document.getElementsByClassName("Closed")
let filterButtons=document.getElementsByClassName("filterIt")
filterButtons[1].children[0].innerText=OpenedJobs.length
filterButtons[2].children[0].innerText=ClosedJobs.length
filterButtons=document.getElementsByClassName("filterIt")

for (const button of filterButtons) {
    button.addEventListener("click",function()
    {
        console.log(this.innerText)
        if (this.innerText.trim().split(" ")[0]=="All")
        {
            for (const div of OpenedJobs)
            div.style.display="block";
            for (const div of ClosedJobs)
            div.style.display="block";
        }
        else if (this.innerText.trim().split(" ")[0]=="Opened")
        {
            for (const div of OpenedJobs)
            div.style.display="block";
            for (const div of ClosedJobs)
            div.style.display="none";
        }
        else if (this.innerText.trim().split(" ")[0]=="Closed")
        {
            for (const div of OpenedJobs)
            div.style.display="none";
            for (const div of ClosedJobs)
            div.style.display="block";
        }
        for (const deactive of filterButtons)
        {
            deactive.classList.remove("activeIt")
        }
        this.classList.add("activeIt")
        // this.classList.add()
    }
    )
    
}
