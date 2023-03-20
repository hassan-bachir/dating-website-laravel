const dating_pages = {};


dating_pages.baseURL = "http://127.0.0.1:8000/api";

//for dynamic loading
dating_pages.loadFor = (page) => {
    eval("dating_pages.load_" + page + "();");
};

// Console Tracker
dating_pages.Console = (title, values, oneValue = true) => {
    console.log("---" + title + "---");
    if (oneValue) {
    console.log(values);
    } else {
    for (let i = 0; i < values.length; i++) {
        console.log(values[i]);
    }
    }
    console.log("--/" + title + "---");
};

// GET API function
dating_pages.getAPI = async (api_url) => {
        try {
        return await axios(api_url);
        } catch (error) {
        dating_pages.Console("Error from GET API", error);
        }
    };


// POST API function - takes the current user api token
dating_pages.postAPI = async (
        api_url,
        api_data,
        api_token = localStorage.getItem("jwt")
    ) => {
        try {
        return await axios.post(api_url, api_data, {
            headers: {
            Authorization: "Bearer " + api_token,
        },
        });
        } catch (error) {
        dating_pages.Console("Error from POST API", error);
        }
    };


    dating_pages.load_login = async () => 
    {
    const formCloser = document.querySelectorAll(".close-form p");
    const signInBtn = document.getElementById("signIn");
    const signInForm = document.getElementById("signInForm");
    const signUpBtn = document.getElementById("signUp");
    const signUpForm = document.getElementById("signUpForm");
    const signInSubmit = document.getElementById("signInSubmit");
    const signUpSubmit = document.getElementById("signUpSubmit");
    signInBtn.addEventListener("click", () => {
        signInForm.style.display = "flex";
    });
    signUpBtn.addEventListener("click", () => {
        signUpForm.style.display = "flex";
    });
    formCloser.forEach((closer) => {
        closer.addEventListener("click", () => {
        signInForm.style.display = "none";
        signUpForm.style.display = "none";
        });
    });

    // -- Login Page Input Controller
    // -- -- Sign In
    signInSubmit.addEventListener("click", async (event) => {
        // Authenticate and Authorize
        // -- Data Section
        const signInEmail = document.getElementById("signInEmail");
        const signInPass = document.getElementById("signInPass");
        const postData = {
        email: signInEmail.value,
        password: signInPass.value,
        };

        // -- API Section
        const login_url = `${dating_pages.baseURL}/login`;
        event.preventDefault();
        const response_login = await dating_pages.postAPI(login_url, postData);
        dating_pages.Console("Testing login API", response_login);
        if (response_login) {
        localStorage.setItem("jwt", response_login.data.authorisation.token);
        window.open("./landingPage.html", "_self");
        } else {
        alert("UNAUTHORIZED");
        }
    });


     

    // -- -- Sign Up
    signUpSubmit.addEventListener("click", async (event) => {
        const signUpName = document.getElementById("signUpName");
        const signUpEmail = document.getElementById("signUpEmail");
        const dateOfBirth = document.getElementById("dob");
        const signUpPass = document.getElementById("signUpPass");
        const gender = document.getElementById("gender"); // 0 male; 1 female
        const selectedGender = document.getElementById("preference"); // 0 male; 1 female
        const interests = "Edit Interests";
        const postData = {
        name: signUpName.value,
        email: signUpEmail.value,
        image: "./assets/default.jpg",
        dob: dateOfBirth.value,
        password: signUpPass.value,
        location: locationUpd,
        gender: gender.value,
        gender_preference: selectedGender.value,
        interests: interests,
        };

        console.log(postData);

        // -- API Section
        event.preventDefault();
        const signup_url = `${dating_pages.baseURL}/register`;
        const response_signup = await dating_pages.postAPI(signup_url, postData);
        dating_pages.Console("Testing login API", response_signup);
        if (response_signup) {
        location.reload();
        } else {
        alert("Please use a different email");
        }
    });
    };

