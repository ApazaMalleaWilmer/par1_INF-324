import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet(urlPatterns = {"/NewServlet_exa"})
public class NewServlet_exa extends HttpServlet {
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        PrintWriter out = response.getWriter();
        try {
 
            String id = request.getParameter("id");
            String tipoImpuesto;
            String alertClass;


            if (id != null && !id.isEmpty()) {
                char primerDigito = id.charAt(0);
                switch (primerDigito) {
                    case '1':
                        tipoImpuesto = "Alto";
                        alertClass = "alert-danger";
                        break;
                    case '2':
                        tipoImpuesto = "Medio";
                        alertClass = "alert-warning";
                        break;
                    case '3':
                        tipoImpuesto = "Bajo";
                        alertClass = "alert-success";
                        break;
                    default:
                        tipoImpuesto = "Desconocido";
                        alertClass = "alert-secondary";
                        break;
                }
            } else {
                tipoImpuesto = "ID no proporcionado";
                alertClass = "alert-info";
            }


            out.println("<!DOCTYPE html>");
            out.println("<html lang='es'>");
            out.println("<head>");
            out.println("    <meta charset='UTF-8'>");
            out.println("    <meta name='viewport' content='width=device-width, initial-scale=1.0'>");
            out.println("    <title>Tipo de Impuesto</title>");
            out.println("    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>");
            out.println("</head>");
            out.println("<body class='bg-light'>");
            out.println("    <div class='container mt-5'>");
            out.println("        <div class='row justify-content-center'>");
            out.println("            <div class='col-md-6'>");
            out.println("                <div class='card shadow'>");
            out.println("                    <div class='card-header bg-primary text-white'>");
            out.println("                        <h1 class='h4 mb-0'>Información de Impuesto</h1>");
            out.println("                    </div>");
            out.println("                    <div class='card-body'>");
            out.println("                        <h2 class='h5 mb-3'>ID Catastral: " + (id != null ? id : "No proporcionado") + "</h2>");
            out.println("                        <div class='alert " + alertClass + "'>");
            out.println("                            <strong>Tipo de impuesto:</strong> " + tipoImpuesto);
            out.println("                        </div>");
            out.println("                        <div class='text-center mt-4'>");
            out.println("                            <a href='http://localhost/examen1_324/4/con_fun/dash.php' class='btn btn-primary'>Volver a Pagar Impuesto</a>");
            out.println("                        </div>");
            out.println("                    </div>");
            out.println("                </div>");
            out.println("            </div>");
            out.println("        </div>");
            out.println("    </div>");
            out.println("    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'></script>");
            out.println("</body>");
            out.println("</html>");
        } finally {
            out.close();
        }
    }

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    @Override
    public String getServletInfo() {
        return "Servlet para determinar el tipo de impuesto basado en el ID catastral";
    }
}