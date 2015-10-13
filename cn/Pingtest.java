import java.io.*;
public class Pingtest 
{
    public static void main(String[] args) 
    {
        try 
        {
            BufferedReader in1 = new BufferedReader(new InputStreamReader(System.in));
            String ip = in1.readLine();
            Runtime r = Runtime.getRuntime();
            Process p = r.exec("ping " + ip);
            BufferedReader in = new BufferedReader(new InputStreamReader(p.getInputStream()));
            String inputLine;
            while ((inputLine = in.readLine()) != null) 
            {
                System.out.println(inputLine);
            }
        }
        catch (Exception e) 
        {
            System.out.println(e);
        }

    }
}