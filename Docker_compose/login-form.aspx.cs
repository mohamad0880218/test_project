using System;
using System.Data.SqlClient;
using System.Configuration;

public partial class Login : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        // Page Load logic, if necessary
    }

    protected void btnLogin_Click(object sender, EventArgs e)
    {
        string username = txtUsername.Text.Trim();
        string password = txtPassword.Text.Trim();

        // Connection string to your database
        string connString = ConfigurationManager.ConnectionStrings["YourDBConnectionString"].ToString();

        using(SqlConnection conn = new SqlConnection(connString))
        {
            try {
                conn.Open();

                string query = "SELECT COUNT(1) FROM Users WHERE Username=@Username AND Password=@Password";
                SqlCommand cmd = new SqlCommand(query, conn);
                cmd.Parameters.AddWithValue("@Username", username);
                cmd.Parameters.AddWithValue("@Password", password);

                int result = Convert.ToInt32(cmd.ExecuteScalar());

                if (result > 0) {
                    // Successfully logged in, redirect to dashboard or home page
                    Response.Redirect("Home.aspx");
                }
                else {
                    // Login failed, display an error message
                    Response.Write("<script>alert('Invalid username or password');</script>");
                }
            }
            catch (Exception ex)
            {
                // Handle exceptions
                Response.Write("<script>alert('Error: " + ex.Message + "');</script>");
            }
        }
    }
}
