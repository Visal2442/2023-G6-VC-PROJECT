export default{
    data(){
        return{ 
            rule : {
                emailRules: [value => !!value || 'Email is required',],
                passwordRules: [value => !!value || 'Password is required',
                value => (value && value.length >= 8) || 'Password at least 8 characters'],
                usernameRules: [
                    (value) => !!value || "Username is required",
                    (value) => (value && value.length >= 5) || "Username at least 5 characters",
                  ],
                phoneRules: [
                    (value) => !!value || "Phone Number is required ",
                    (value) => /^\+?[0]\d{8,20}$/.test(value) || "Phone Number is invalid",
                  ],
                confirmRules: [
                    (value) => !!value || "Confirm Password is required",
                    (value) => (value && value == this.password) || "Password does not match!",
                  ],
                messageRules: [value => !!value || 'message is required'],
                nameHouse: [value => !!value || 'Housename is required'],
                size: [value => !!value || 'size is required',],
                price: [value => !!value || 'Price is required '],
                numberFloor: [value => !!value || 'number of floor is required'],
                numberRoom: [value => !!value || 'number of room  is required'],
                numberKitchen: [value => !!value || 'number of kitchen  is required'],
                numberBathroom: [value => !!value || 'number of bathroom  is required'],
                description: [value => !!value || ' description is required'],
                district: [value => !!value || ' districts of property is required'],
                checkInDateRules: [value => !!value || 'check in date is required'],
                checkOutDateRules: [value => !!value || 'check out date is required'],
                firstRules: [value => !!value || 'First name is required'],
                lastRules: [value => !!value || 'Last name is required'],
            }
        }
    }
}