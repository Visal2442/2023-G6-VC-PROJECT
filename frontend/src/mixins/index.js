export default{
    data(){
        return{ 
            rules : {
                emailRules: [value => !!value || 'Email is required',],
                passwordRules: [value => !!value || 'Password is required',
                value => (value && value.length >= 8) || 'Password at least 8 characters'],
            }
        }
    }
}