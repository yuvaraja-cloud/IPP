package
folder;
import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletConfig;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.annotation.WebInitParam;
import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
/**
*
* @author HP
*/
@WebServlet(name = "NewServletshop1", urlPatterns = {"/NewServletshop1"}, initParams = {
 @WebInitParam(name = "user1", value = "123")
 , @WebInitParam(name = "user2", value = "345")
 , @WebInitParam(name = "user3", value = "567")})
public class NewServletshop1 extends HttpServlet {
 /**
 * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
 * methods.
 *
 * @param request servlet request
 * @param response servlet response
 * @throws ServletException if a servlet-specific error occurs
 * @throws IOException if an I/O error occurs
 */
 protected void processRequest(HttpServletRequest request, HttpServletResponse response)
 throws ServletException, IOException {
 response.setContentType("text/html;charset=UTF-8");
 try (PrintWriter out = response.getWriter()) {
 String name=request.getParameter("n");

 String password=request.getParameter("p");
 String ccard=request.getParameter("c");

 ServletConfig config=getServletConfig();

 String user[]=config.getInitParameter("user").split(",");
 String card[]=config.getInitParameter("credit").split(",");
 String pwd[]=config.getInitParameter("password").split(",");

 Cookie c;
 out.println("<!DOCTYPE html>");
 out.println("<html>");
 out.println("<head>");

 out.println("</head>");
 out.println("<body>");




 for(int i=0;i<user.length;i++)
 {

 if(name.equals(user[i]) && ccard.equals(card[i]) && password.equals(pwd[i]))
 {
 out.println("<h1>Your are logged in </h1>");
 c=new Cookie("name",user[i]);
 response.addCookie(c);
 c=new Cookie("card",card[i]);
 response.addCookie(c);
 c=new Cookie("password",pwd[i]);
 response.addCookie(c);
 }
 }
 out.println("</body>");
 out.println("</html>");
 }
 }
 // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit
the code.">
 /**
 * Handles the HTTP <code>GET</code> method.
 *
 * @param request servlet request
 * @param response servlet response
 * @throws ServletException if a servlet-specific error occurs
 * @throws IOException if an I/O error occurs
 */
 @Override
 protected void doGet(HttpServletRequest request, HttpServletResponse response)
 throws ServletException, IOException {
 processRequest(request, response);
 }
 /**
 * Handles the HTTP <code>POST</code> method.
 *
 * @param request servlet request
 * @param response servlet response
 * @throws ServletException if a servlet-specific error occurs
 * @throws IOException if an I/O error occurs
 */
 @Override
 protected void doPost(HttpServletRequest request, HttpServletResponse response)
 throws ServletException, IOException {
 processRequest(request, response);
 }
 /**
 * Returns a short description of the servlet.
 *
 * @return a String containing servlet description
 */
 @Override
 public String getServletInfo() {
 return "Short description";
 }// </editor-fold>
}
