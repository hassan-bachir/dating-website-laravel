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

